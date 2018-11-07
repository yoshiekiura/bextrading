<template>
    <div>
        <h1>Componente</h1>
    </div>

</template>

<script>
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
components: {
    FormWizard,
    TabContent
}
   Vue.use(VueFormWizard)
new Vue({
 el: '#app',
 methods: {
  onComplete: function(){
      alert('Yay. Done!');
   }
  }
})
</script>
