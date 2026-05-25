<template>
    <!-- ЛОГОТИП -->
    <footer class="header-full">

        <div class="section-footer1">
            <a href="/">TI-Weld</a> 
        </div>

    <!-- НАВИГАЦИЯ -->
        <nav class="sections-footer">
            <div class="section-footer">
                <a href="/">ГЛАВНАЯ</a>
                <a href="/reviews">ОТЗЫВЫ</a>
                <a href="/works">НАШИ РАБОТЫ</a>
            </div>
            <div class="section-footer">
                <a href="/services">УСЛУГИ</a>
                <a href="/contact-us">СВЯЗАТЬСЯ С НАМИ</a>
                <a href="/ourwork">ПОДХОД К РАБОТЕ</a>
            </div>
            <div class="section-footer">
                <a href="/workers">СПЕЦИАЛИСТЫ</a>
                <a href="/calculator">КАЛЬКУЛЯТОР</a>
                <a href="/contacts">КОНТАКТЫ</a>
            </div>
        </nav>

    <!-- КОЕНТАКТЫ -->
        <div class="contacts">
            <span>тел: +7 (312) 499 99-99</span>

            <div class="messes">
                    <a href="https://t.me/+0r2IeZcjtBRmOGIy"><img src="../../src/icons/telegram.svg" alt="телеграм"></a>
                    <a href="https://vk.ru/im/channels/-238496043"><img src="../../src/icons/vk.svg" alt="вк"></a>
            </div>
        </div>

    </footer>

</template>

<script>

</script>

<style>
footer{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 243px;
    background-color: #1E1E5A;
    padding: 67px;

}
/* настройка шрифта */
.section-footer1 a, .section-footer a, .contacts span{
    color: #D1D1E2;

}
.section-footer a:hover{
    color: #d1d1e2b6;
    text-decoration: underline solid ;
}

.section-footer1 a{
    font-size: 32px;
}
.section-footer a{
    font-size: 16px;
    width: 212px;
}
/* настройка футера */
.section-footer{
    display: flex;
    gap: 20px;
    flex-direction: column;
}
.sections-footer{
    display: flex;
    gap: 20px;
}
.contacts{
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: end;
}
.messes{
    display: flex;
    gap: 20px;
}

/* адаптив */
@media(max-width: 768px) {
     footer {
        display: flex;

        justify-content: space-between;
        align-items: center;

        gap: 20px;

        padding: 30px 20px;
    }

    .sections-footer {
        display: none;
    }

    .section-footer1 {
        width: auto;
        min-width: 120px;
    }

    .section-footer1 a {
        font-size: 24px;
        white-space: nowrap;
    }

    .contacts {
        width: auto;

        align-items: flex-end;

        min-width: 150px;
    }

    .contacts span {
        font-size: 14px;
        text-align: right;
    }

    .messes img {
        width: 28px;
        height: 28px;
    }
}


</style>