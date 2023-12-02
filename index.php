<?php include __DIR__ . '/partials/header.php';



?>



<main>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 my-container">
        <h1 class="text-center">to-do-list</h1>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Add to-do-list item" aria-label="Recipient's username"
            aria-describedby="button-addon2" v-model="newItemList" @keyup.enter="addItem">
          <button class="btn btn-danger" type="button" id="button-addon2" @click="addItem">Add new item</button>
        </div>

        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between" :id="item.id" v-for="(item, index) in toDoList"
            :key="item.id"><span :class="{'done':item.done}" @click="itemDone(item.id)">{{item.text}}</span> <i
              class="fa-solid fa-xmark" @click="removeItem(item.id)"></i>
          </li>
        </ul>

        <div v-if="toDoList.length === 0"
          class="bg-warning rounded-2 empty-list d-flex align-items-center justify-content-center">
          <span class="">Non Sono presenti oggetti all'interno della lista</span>
        </div>


      </div>
    </div>
  </div>
</main>


<?php include __DIR__ . '/partials/footer.php'; ?>