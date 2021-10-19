"use strict";

var tabs = document.querySelectorAll('.button-tab');
var contentTabs = document.querySelectorAll('.tab-content');

if (tabs.length > 0) {
  var _loop = function _loop(index) {
    var element = tabs[index];
    element.addEventListener('click', function () {
      var value = element.dataset.tab;
      var currentElement = document.querySelector('.' + value);

      for (var _index = 0; _index < tabs.length; _index++) {
        var _element = tabs[_index];

        _element.classList.remove('init');
      }

      element.classList.add('init');

      for (var _index2 = 0; _index2 < contentTabs.length; _index2++) {
        var _element2 = contentTabs[_index2];

        _element2.classList.remove('init');
      }

      currentElement.classList.add('init');
    });
  };

  for (var index = 0; index < tabs.length; index++) {
    _loop(index);
  }
}