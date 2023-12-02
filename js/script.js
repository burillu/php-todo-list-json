

const { createApp } = Vue

createApp({
  data() {
    return {
      message: 'Hello Pippo!',
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
      })
    },
    postAxios(key, value, url) {
      const data = new FormData();
      data.append(key, value);
      return axios.post(url, data);
    },
    removeItem(ident) {
      //const index = this.findElement(ident, this.toDoList)
      //const index = this.toDoList.findIndex((el)=>el.id === ident)
      //console.log(index);
      this.postAxios('delete', ident, this.apiUrl)
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
      this.toDoList[index].done = !this.toDoList[index].done;
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