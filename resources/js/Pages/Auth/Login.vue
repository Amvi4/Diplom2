<script setup>
import { useForm, router, Head } from '@inertiajs/vue3';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        // автосохранение
        onSuccess: () => {

            const review =
        localStorage.getItem('pending_review')

    if (review) {

        setTimeout(() => {

            router.post('/reviews', {
                text: review
            })

            localStorage.removeItem(
                'pending_review'
            )

        }, 300)
    }
        }
    });
};
</script>

<template>
    <Head>
        <title>Вход</title>

        <meta
            name="description"
            content="TI-Weld Войти"
        />
    </Head>
    <Header />
        <section class="form">
            <div class="form-section">
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <h2>Войти</h2>

                <form @submit.prevent="submit" class="forma">
                    <div class="form-inputs">
                        <div class="form-input">

                            <input
                                id="email"
                                type="email"
                                class="mt-1"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="Введите ваш E-mail"
                            />

                            
                        </div>

                        <div class="form-input">

                            <input
                                id="password"
                                type="password"
                                class="mt-1"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                                placeholder="Введите пароль"
                            />

                            <span v-if="form.errors.email" class="error">Введены некоректные данные</span>
                        </div>
                    </div>

                    <div class="flex">

                        <button class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Войти
                        </button>
                        <span class="acc">Нет аккаунта? <a href="/register">Зарегистрируйтесь</a></span>
                    </div>
                </form>
            </div>
        </section>
        <Footer />
</template>

<style scoped>
.form-section {
  padding: 42px 155px;
  background-color: #1E1E5A;
  border-radius: 16px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 42px;
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 100px;
}

.form h2 {
  font-size: 36px;
  color: #D1D1E2;
}

.form-input {
  display: flex;
  flex-direction: column;
  gap: 20px;
  background-color: transparent;
  border: transparent;
  width: 908px;
}

.form-input input {
  height: 40px;
  background-color: transparent;
  color: #D1D1E2;
  border-radius: 8px;
  border: 1px solid #D1D1E2;
  max-width: 908px;
}

.form-inputs {
  max-width: 908px;
}

.mt-1::placeholder {
  color: #D1D1E2;
}

.forma {
  display: flex;
  flex-direction: column;
  gap: 100px;
  align-items: center;
}

.flex {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 598px;
  gap: 20px;
}

.flex button {
  height: 40px;
  background-color: #D1D1E2;
  color: #1E1E5A;
  border-radius: 8px;
  width: 598px;
  margin: 0;
}

.flex button:hover {
  background-color: transparent;
  color: #D1D1E2;
}

.acc {
  color: #D1D1E2;
  font-size: 16px;
}

.acc a {
  color: #D1D1E2;
  font-size: 16px;
  text-decoration: underline;
  text-underline-offset: 2px;
}

.acc a:hover {
  color: #d1d1e260;
}

.error {
  margin: 0;
  padding: 0;
  color: red;
  font-family: 'light';
}

/* АДАПТИВ */
@media (max-width: 1024px) {
  .form {
    padding: 60px 40px;
    margin: 0 0 400px 0;
  }

  .form-section {
    padding: 30px 60px;
    width: 100%;
    max-width: 700px;
  }

  .form-input {
    width: 100%;
    max-width: 600px;
  }

  .flex {
    width: 100%;
    max-width: 400px;
  }

  .flex button {
    min-width: 100%;
  }
}

@media (max-width: 768px) {
  .form {
    padding: 40px 20px;
  }

  .form-section {
    padding: 30px 25px;
    width: 100%;
    gap: 30px;
  }

  .form h2 {
    font-size: 28px;
  }

  .form-input {
    width: 100%;
    max-width: 100%;
  }

  .form-input input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    box-sizing: border-box;
  }

  .form-inputs {
    width: 100%;
    max-width: 100%;
  }

  .forma {
    gap: 50px;
    width: 100%;
  }

  .flex {
    width: 100%;
    max-width: 100%;
    gap: 15px;
  }

  .flex button {
    width: 100%;
    height: 45px;
    font-size: 16px;
  }

  .acc {
    font-size: 14px;
  }

  .acc a {
    font-size: 14px;
  }

  .error {
    font-size: 12px;
  }
}

@media (max-width: 480px) {
  .form {
    padding: 30px 15px;
  }

  .form-section {
    padding: 25px 20px;
    gap: 25px;
  }

  .form h2 {
    font-size: 24px;
  }

  .form-input {
    gap: 15px;
  }

  .form-input input {
    height: 42px;
    padding: 8px;
    font-size: 13px;
  }

  .forma {
    gap: 35px;
  }

  .flex {
    gap: 12px;
  }

  .flex button {
    height: 42px;
    font-size: 14px;
  }

  .acc {
    font-size: 12px;
  }

  .acc a {
    font-size: 12px;
  }

  .error {
    font-size: 11px;
  }
}
</style>

<!-- #D1D1E2 -->
