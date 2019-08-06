<template>
  <div>
      <h1>Comment</h1>


      <div class="form-group">
    <label for="name">Comment:</label>
    <input type="text" class="form-control" id="name" name="name" 
        required v-model="newItem.comment" placeholder=" EnterComment">
</div>

 
<button class="btn btn-primary" @click.prevent="createItem()" id="name" name="name">
<span class="glyphicon glyphicon-plus"></span> Comment
</button>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
           
          </div>
        </div><br />

       <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
          
            </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" >
                    <td>{{ post.pro_id }}</td>
                    <td>{{ post.comment }}</td>
                    <td>{{ post.comment }}</td>
                  
                    
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
  props: ['product'],

        data() {
            return {
            posts: [],
            newItem: { 'comment': '' },

        }
    }
    ,
        methods:{
            getcomment: function() {

            let uri = `/get/comment/${this.product}`;
                axios.get(uri).then(function(response){
                    this.posts = response.data;
                }.bind(this));
            },

createItem: function createItem() {
      
      var _this = this;
      var input = this.newItem;
        axios.post('/store/comment', input).then(function (response) {
          _this.newItem = { 'name': '' };
          _this.getVueItems();
        });

    }
        },
        created: function(){
            this.getcomment()
        },


  }






</script>