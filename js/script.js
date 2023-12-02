

const { createApp } = Vue

createApp({
  data() {
    return {
      message: 'To-do List php',
      toDoList: [{
        text: "Pippo",
        done: true,
        id: 1
      }],
      lastId: 3,
      newItemList: '',
      apiUrl: 'server.php'

    }
  },
  methods: {
    readJson() {
      axios.get(this.apiUrl).then(resp => {
        //console.log(resp.data);
        this.toDoList = resp.data;
        console.log(this.toDoList);
      })
    },
    postAxios(key, value, url) {
      const data = new FormData();
      data.append(key, value);
      return axios.post(url, data);
    },
    removeItem(ident) {
      const index = this.findElement(ident, this.toDoList)
      console.log(this.toDoList);
      //const index = this.toDoList.findIndex((el) => el.id === ident)
      console.log(ident);

      this.postAxios('delete', index, this.apiUrl)
        .then(resp => {
          console.log(resp.data);
          this.toDoList = resp.data;
        });

      //this.toDoList.splice(index, 1)
    },
    addItem() {
      //chamata axios POST
      this.postAxios('task', this.newItemList, this.apiUrl)
        .then(resp => {
          console.log(resp.data);
          this.toDoList = resp.data;

        })
        .catch(function (error) {
          console.log(error);
        });

      // this.toDoList.unshift(newItem);
      // this.newItemList = '';
    },
    itemDone(ident) {
      const index = this.findElement(ident, this.toDoList);
      //this.toDoList[index].done = !this.toDoList[index].done;
      this.postAxios('done', index, this.apiUrl)
        .then(resp => {
          console.log(resp.data);
          this.toDoList = resp.data;
        });
      //obj.done=!obj.done
      //console.log('item done')
    },
    findElement(ident, array) {
      return array.findIndex(el => el.id === ident);
    },

  },
  created() {
    this.readJson();


  }
}).mount('#app')