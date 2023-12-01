

const { createApp } = Vue

createApp({
  data() {
    return {
      message: 'Hello Pippo!',
      toDoList: [
        {
          text: 'Fare la Spesa',
          done: true,
          id: 1
        },
        {
          text: 'Fare la lavatrice',
          done: false,
          id: 2
        },
        {
          text: 'Pagare l\' affitto',
          done: false,
          id: 3
        },

      ],
      lastId: 3,
      newItemList: ''

    }
  },
  methods: {
    removeItem(ident) {
      const index = this.findElement(ident, this.toDoList)
      //const index = this.toDoList.findIndex((el)=>el.id === ident)
      //console.log(index);
      this.toDoList.splice(index, 1)
    },
    addItem() {
      this.lastId++;
      const newItem = {
        text: this.newItemList,
        done: false,
        id: this.lastId

      }
      this.toDoList.unshift(newItem);
      this.newItemList = '';
    },
    itemDone(ident) {
      const index = this.findElement(ident, this.toDoList);
      this.toDoList[index].done = !this.toDoList[index].done;
      //obj.done=!obj.done
      //console.log('item done')
    },
    findElement(ident, array) {
      return array.findIndex(el => el.id === ident);
    }
  }
}).mount('#app')