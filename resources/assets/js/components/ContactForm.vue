<template>
  <div class="form-contact">
    <transition name="fade" mode="out-in">
      <p v-if="sent">Tu mensaje ha sido recibido, te contactaremos pronto</p>
      <form @submit.prevent="submit" v-else>
        <div class="input-container container-flex space-between">
          <input placeholder="Tu nombre" class="input-name" v-model="form.name" required>
          <input type="email" placeholder="Email" class="input-email" v-model="form.email" required>
        </div>
        <div class="input-container">
          <input placeholder="Asunto" class="input-subject" v-model="form.subject" required>
        </div>
        <div class="input-container">
          <textarea cols="30" rows="10" placeholder="Tu mensaje" v-model="form.message" required></textarea>
        </div>
        <div class="send-message">
          <button class="text-uppercase c-green" :disabled="working">
            <span v-if="working">Enviando...</span>
            <span v-else>Enviar mensaje</span>
          </button>
        </div>
      </form>
    </transition>
  </div>
</template>

<script>
export default {
  data(){
    return {
      sent: false,
      working: false,
      form: {
        name: 'Marco',
        email: 'admin@mail.com',
        subject: 'Ayuda',
        message: 'Necesito ayuda porfavor.',
      }
    }
  },
  methods: {
    submit(){
      this.working = true;

      axios.post('/api/messages', this.form)
            .then(res => {
              this.sent = true;
              this.working = false;
            })
            .catch(errors => {
              this.sent = false;
              this.working = false;
            })
    }
  }
}
</script>