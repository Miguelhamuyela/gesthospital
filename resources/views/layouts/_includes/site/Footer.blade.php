<!-- ====== Footer Start ====== -->

<footer class="ud-footer" style="background-color: #4A2812;">


    <div class="ud-footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-6">
                    <div class="ud-widget">
                        <a href="#!" class="ud-footer-logo mx-auto text-center">
                            <img src="/images/logotipo/logo-white.png" width="100%">
                        </a>
                        <ul class="ud-widget-socials">

                            <li class=" mx-auto text-center">
                                <a href="{{ $configuration->facebook }}" target="_blank">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li class=" mx-auto text-center">
                                <a href="{{ $configuration->linkedin }}" target="_blank">
                                    <i class="lni lni-linkedin"></i>
                                </a>
                            </li>
                            <li class=" mx-auto text-center">
                                <a href="{{ $configuration->instagram }}" target="_blank">
                                    <i class="lni lni-instagram-filled"></i>
                                </a>
                            </li>
                            <li class=" mx-auto text-center">
                                <a href="{{ $configuration->twitter }}" target="_blank">
                                    <i class="lni lni-twitter"></i>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">O CENSO</h5>
                        <ul class="ud-widget-links">
                            <li>
                                <a href="{{ route('site.definition') }}">Definição</a>
                            </li>

                            <li>
                                <a href="{{ route('site.regulation') }}">Regulamentos</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">O CONCURSO</h5>
                        <ul class="ud-widget-links">

                            <li>
                                <a href="{{ route('site.profile') }}">Perfil Requisitado</a>
                            </li>

                            <li>
                                <a href="{{ route('site.candidacy.verify') }}">Status da Prova</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">INFORMAÇÕES</h5>
                        <ul class="ud-widget-links">
                            <li>
                                <a href="{{ route('site.announcent') }}">Anúncios</a>
                            </li>

                            <li>
                                <a href="{{ route('site.news') }}">Notícias</a>
                            </li>
                      

                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ud-widget">
                        <h5 class="ud-widget-title">LINKS ÚTEIS</h5>
                        <ul class="ud-widget-links">


                            <li>
                                <a href="https://governo.gov.ao/" target="_blank">Governo de Angola</a>
                            </li>

                            <li>
                                <a href="https://www.ine.gov.ao/" target="_blank">Instituto Nacional de Estatística</a>
                            </li>

                            <li>
                                <a href="https://censo.ine.gov.ao/" target="_blank">Censo Angola 2024</a>
                            </li>
                        </ul>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="ud-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="ud-footer-bottom-left">
                        <li>
                            <a href="{{ route('site.policyPrivacy') }}">Termos de Uso &
                                Políticas de Privacidade</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <p class="ud-footer-bottom-right text-white">Censo Angola 2024 © Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- ====== Footer End ====== -->

<!-- ====== Back To Top Start ====== -->
<a href="javascript:void(0)" class="back-to-top">
    <i class="lni lni-chevron-up"> </i>
</a>
<!-- ====== Back To Top End ====== -->

@if (1 == 2)

@if (Route::currentRouteName() !== 'site.candidacy.verify')
    @if (Route::currentRouteName() !== 'site.candidacy.show')
        @if (Route::currentRouteName() !== 'site.candidacy')
            <a href="{{ route('site.candidacy.verify') }}" class="avalie">
                Status da Prova
            </a>
        @endif
    @endif
@endif

@endif

@if (session('helpCreate'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Mensagem enviada com sucesso!',
            showConfirmButton: false,
            timer: 2000
        })
    </script>


@elseif (session('respost'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Prova submetida com sucesso!',
            text: 'O prazo para a correcção da Prova é de 48horas! \n \n Consulte o menu meu resultado para ver o estado da sua Nota!',
            showConfirmButton: true
        })
    </script>
@elseif (session('candidacyCreate'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Candidatura submetida com sucesso!',
            text: 'O prazo para a correcção da candidatura é de 48horas! \n \n Consulte o menu minha candidatura para ver o estado da sua candidatura!',
            showConfirmButton: true
        })
    </script>
@elseif (session('candidacyEdit'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Alterações foram salvas com sucesso!',
            showConfirmButton: true
        })
    </script>
@endif

<!-- ====== All Javascript Files ====== -->
<script src="/site/js/bootstrap.bundle.min.js"></script>
<script src="/site/js/wow.min.js"></script>
<script src="/site/js/main.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        function initializeCountdown(endDate) {
            const countdownElement = document.querySelector('.event-countdown');
            const daysElement = countdownElement.querySelector('.countdown-section:nth-child(1) h2');
            const hoursElement = countdownElement.querySelector('.countdown-section:nth-child(2) h2');
            const minutesElement = countdownElement.querySelector('.countdown-section:nth-child(3) h2');
            const secondsElement = countdownElement.querySelector('.countdown-section:nth-child(4) h2');

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = new Date(endDate).getTime() - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                daysElement.textContent = days;
                hoursElement.textContent = hours;
                minutesElement.textContent = minutes;
                secondsElement.textContent = seconds;

                if (distance < 0) {
                    clearInterval(interval);
                    daysElement.textContent = 0;
                    hoursElement.textContent = 0;
                    minutesElement.textContent = 0;
                    secondsElement.textContent = 0;
                }
            }

            updateCountdown();
            const interval = setInterval(updateCountdown, 1000);
        }

        const countdownDate = "2024/09/19 08:00:00"; // Data e hora final do cronômetro
        initializeCountdown(countdownDate);
    });
</script>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@yield('JS')

</body>

</html>
