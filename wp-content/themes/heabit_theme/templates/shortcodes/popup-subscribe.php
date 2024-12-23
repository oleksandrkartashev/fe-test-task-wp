<div id="subscription-popup" class="popup-subscribe">
    <div class="popup-subscribe-container">
        <button class="popup-subscribe-close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.39705 4.55379L4.46967 4.46967C4.73594 4.2034 5.1526 4.1792 5.44621 4.39705L5.53033 4.46967L12 10.939L18.4697 4.46967C18.7626 4.17678 19.2374 4.17678 19.5303 4.46967C19.8232 4.76256 19.8232 5.23744 19.5303 5.53033L13.061 12L19.5303 18.4697C19.7966 18.7359 19.8208 19.1526 19.6029 19.4462L19.5303 19.5303C19.2641 19.7966 18.8474 19.8208 18.5538 19.6029L18.4697 19.5303L12 13.061L5.53033 19.5303C5.23744 19.8232 4.76256 19.8232 4.46967 19.5303C4.17678 19.2374 4.17678 18.7626 4.46967 18.4697L10.939 12L4.46967 5.53033C4.2034 5.26406 4.1792 4.8474 4.39705 4.55379L4.46967 4.46967L4.39705 4.55379Z"/>
            </svg>
        </button>
        <div class="popup-subscribe-step step-1">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/popup-step1-bg.jpeg" alt="subscribe" loading="lazy" class="popup-subscribe-image" />
            <div class="popup-subscribe-content">
                <p class="popup-subscribe-text">Підпишись на новини Heabit</p>
                <h2 class="popup-subscribe-title">Отримай -10% на перше замовлення</h2>
                <form id="subscription-form" method="post" class="popup-subscribe-form">
                    <div>
                        <input type="email" id="subscriber_email" name="subscriber_email" required placeholder="Твій е-мейл" class="popup-subscribe-input" />
                    </div>
                    <button type="submit" id="subscribe_button" class="popup-subscribe-submit">Підписатися</button>
                    <p class="popup-subscribe-policy">
                        Підписуючись, ти погоджуєшся з <a href="#">Політикою конфіденційності.</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="popup-subscribe-step step-2">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/src/img/popup-step2-bg.jpeg" alt="discount" loading="lazy" class="popup-subscribe-image" />
            <div class="popup-subscribe-content">
                <p class="popup-subscribe-text">Ще кілька кроків…</p>
                <h2 class="popup-subscribe-title">Підтвердь е-мейл, щоб отримати свої -10%</h2>
                <div class="popup-subscribe-discount discount">
                    <ul class="discount-steps">
                        <li>Відкрий лист<br> на вказаній пошті</li>
                        <li>Підтверди<br> підписку й зачекай</li>
                        <li>Скопіюй<br> промокод із наступного листа</li>
                        <li>Введи<br> промокод у кошику</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
