'use strict';
Vue.config.devtools = true;

window.initFlipcardInstance = function(selector) {
  return new Vue({
    el: selector,
    mounted: function() {
      Array.prototype.forEach.call(
        this.$el.querySelectorAll('.flipcard'),
        function(card) {
          // Plot data, render then show the card
          Vue.nextTick().then(function() {
            card.classList.add('flipcard-loaded');
          });
        }
      );
    }
  });
}
