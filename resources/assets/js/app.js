
new Vue({
  el: '#crud',
  created: function(){
    this.getKeeps();
  },
  data: {
    keeps: []
  },
  methods: {
    getKeeps: function(){
      var urlKeeps = 'tareas';

      axios.get(urlKeeps).then(response => {
        this.keeps = response.data
      });
    },
    deleteKeep: function(keep){
      var url = 'tareas/' + keep.id;
      axios.delete(url).then(response => {
        this.getKeeps();
      });
    }
  }

});
