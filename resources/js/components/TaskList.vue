<template>
    <div>
        <div class="jumbotron">
            <h1 class="display-4">Laravel VueJS Tasks</h1>
            <br>
                <h1 class="lead">
                    This is a simple task list made with Laravel and VueJS.<br>
                    You can add and remove (done) task list.
                </h1>
            <hr><br>
            <div>
                <h4 class="lead">New Task</h4>
                <form action="#" @submit.prevent="addTask()">
                    <div class="input-group">
                        <input
                          v-model="task.task_detail"
                          type="text"
                          name="task_detail"
                          class="form-control mb-2"
                          autofocus
                        >
                    </div>

                    <button type="submit" class="btn btn-primary float-right mb-2">
                        Add Task
                    </button>
                </form>
            </div>
        </div>

        <div>
            <br>
            <h4 class="lead">Task List</h4>
            <ul class="list-group">
                <li v-if="list.length === 0">
                    <h1 class="lead">There are no tasks yet!</h1>
                </li>

                <li class="list-group-item" v-for="(task, index) in list">
                    {{ task.task_detail }}

                    <button @click="removeTask(task.id)" class="btn btn-danger float-right">
                        Done
                    </button>
                </li>
            </ul>
        </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        list : [],
        task: {
          id: '',
          task_detail: ''
        }
      };
    },

    created() {
      this.fetchTaskList();
    },

    methods: {
      fetchTaskList() {
        axios.get('./api/tasks')
        .then((res) => this.list = res.data);
      },

      addTask() {
        axios.post('./api/tasks', this.task)
        .then((res) => {
          this.task.task_detail = '';
          this.edit = false;
          this.fetchTaskList();
        })
        .catch((err) => console.error(err));
      },

      removeTask(id) {
        axios.delete('./api/tasks/' + id)
        .then((res) => {
          this.fetchTaskList()
        })
        .catch((err) => console.error(err));
      },
    }
  }
</script>
