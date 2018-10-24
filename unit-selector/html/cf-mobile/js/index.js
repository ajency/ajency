'use strict';

var React = require('react');
var ReactSwipe = require('react-swipe');

var Panes = Array.apply(null, Array(20)).map(function (_, i) {
  return React.createElement('div', {key: i},
      React.createElement('b', null, i)
  );
});

var Page = React.createClass({
  next: function () {
    this.refs.ReactSwipe.swipe.next();
  },

  prev: function () {
    this.refs.ReactSwipe.swipe.prev();
  },

  render: function () {
    return (
      React.createElement('div', null,
        React.createElement('h1', null, 'ReactSwipe'),
        React.createElement('h2', null, 'sdslated).'),
        React.createElement(ReactSwipe, {
          ref: 'ReactSwipe',
          id: 'mySwipe'
        }, Panes),
        React.createElement('div', {style: {textAlign: 'center'}},
          React.createElement('button', {onClick: this.prev}, 'Prev'),
          React.createElement('button', {onClick: this.next}, 'Next')
        )
      )
    );
  }
});

React.render(
  React.createElement(Page, null),
  document.getElementById('app')
);
