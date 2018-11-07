
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');
// require('../tradify/Main/app/js/tradify.js');
// require('../tradify/Main/app/js/pages.js');
// require('../tradify/Main/plugins/fastclick/fastclick.js');
// require('../tradify/Main/plugins/jquery/jquery.js');
// // require('../tradify/Main/plugins/velocity/velocity.ui.js');
// require('../tradify/Main/plugins/chosen/chosen.jquery.js');
// require('../tradify/Main/plugins/filestyle/bootstrap-filestyle.js');
// require('../tradify/Main/plugins/slider/js/bootstrap-slider.js');
// require('../tradify/Main/plugins/animo/animo.js');
// require('../tradify/Main/plugins/sparklines/jquery.sparkline.js');
// require('../tradify/Main/plugins/slimscroll/jquery.slimscroll.js');
// require('../tradify/Main/plugins/datatable/media/js/jquery.dataTables.js');
// require('../tradify/Main/plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrap.js');
// // require('../tradify/Main/plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrapPagination.js');
// require('../tradify/Main/tradify/highcharts.js');
// require('../tradify/Main/tradify/exporting.js');
// require('../tradify/Main/plugins/datatable/extensions/ColVis/js/dataTables.colVis.js');


window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('form-wizard-component', require('./components/Form-WizardComponent.vue'));





