import moment from 'moment'
import Vue from 'vue'
Vue.filter('timeformat', (arg) => {
  return moment(arg).format("MMM Do YYYY")
})

Vue.filter('sortlength', (text, length, suffix) => {
    return text.substring(0,length)+suffix;
})

Vue.filter('striphtml', function (value) {
  var div = document.createElement("div");
  div.innerHTML = value;
  var text = div.textContent || div.innerText || "";
  return text;
});