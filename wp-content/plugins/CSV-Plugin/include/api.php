<?php
/*
 * Api configuration and methods of the plugin of the plugin
 * 
 */

/*
 * plugin api functionality
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if(is_plugin_active('json-rest-api/plugin.php')){    
    /*
     * function to configure the plugin api routes
     */
    function csvimport_plugin_api_init($server) {
        global $csvimport_plugin_api;

        $csvimport_plugin_api = new CsvImportAPI($server);
        add_filter( 'json_endpoints', array( $csvimport_plugin_api, 'register_routes' ) );
    }
    add_action( 'wp_json_server_before_serve', 'csvimport_plugin_api_init',10,1 );

    class CsvImportAPI {

        /**
         * Server object
         *
         * @var WP_JSON_ResponseHandler
         */
        protected $server;

        /**
         * Constructor
         *
         * @param WP_JSON_ResponseHandler $server Server object
         */
        public function __construct(WP_JSON_ResponseHandler $server) {
                $this->server = $server;
        }

        /*Register Routes*/
        public function register_routes( $routes ) {
             $routes['/csvimport/componentheaders/(?P<component>\w+)'] = array(
                array( array( $this, 'get_component_headers'), WP_JSON_Server::READABLE ),
                );
             $routes['/csvimport/getcsvpreview'] = array(
                array( array( $this, 'get_csv_preview'), WP_JSON_Server::CREATABLE | WP_JSON_Server::ACCEPT_JSON),
                );
             $routes['/csvimport/splitcsv/(?P<csv_id>\d+)/(?P<csv_header>\d+)'] = array(
                array( array( $this, 'split_csv'), WP_JSON_Server::READABLE ),
                );
             $routes['/csvimport/processcsv/(?P<csv_id>\d+)'] = array(
                array( array( $this, 'process_csv'), WP_JSON_Server::READABLE ), 
                );
             $routes['/csvimport/getcsvlogs/(?P<csv_id>\d+)'] = array(
                array( array( $this, 'get_csv_log_urls'), WP_JSON_Server::READABLE ), 
                );             
            return $routes;
        }
        
        /*
         * function to get component response headers
         * @param string $component
         * 
         * uses function ajci_get_component_headers
         */
        public function get_component_headers($component){
            if(isset($component)){
                $headers = ajci_get_component_headers($component);
                $response = $headers;
             }
             else{
                 $response =array('Invalid Request');
             }
            wp_send_json($response);
        }
        
        /*
         * function to get a csv file preview response
         * uses function ajci_csv_get_preview
         */
        public function get_csv_preview($data){
            $component = $data['component'];
            $csv_path = $data['filepath'];
            $preview_type = isset($data['preview_type'])? $data['preview_type'] : '';
            $response = ajci_csv_get_preview($component ,$csv_path, $preview_type);
            wp_send_json($response);
        }
        
        /*
         * function to split a master csv file into smaller parts
         * @param int $csv_id
         * @param bool $csv_header 0|1 1 if first row of csv is header row and should not be considered
         * uses function ajci_split_csv
         * 
         * generates the response array which containes names of part file
         */
        public function split_csv($csv_id,$csv_header){
            $csv_id = intval($csv_id);
            $header = (bool) $csv_header;
            
            $meta = array(
                     'header' =>$header,
                    );
            ajci_csv_update_meta($csv_id,$meta);
            $response = ajci_split_csv($csv_id);
            wp_send_json($response);
        }
        
        /*
         * function to process a csv record
         * @param int $csv_id
         * 
         * generates the response with status of csv record being processed
         */
        public function process_csv($csv_id){
            $csv_id = intval($csv_id);
            $response = ajci_process_csv($csv_id);
            wp_send_json($response);        
        }
        
        /*
         * function to get the csv import log file paths for a csv id
         * @param int $csv_id
         * 
         * generates the response with the log urls for a csv master record
         */
        public function get_csv_log_urls($csv_id){
            $csv_id = intval($csv_id);
            $response = ajci_get_csv_logs($csv_id);
            wp_send_json($response);              
        }
    }

}
