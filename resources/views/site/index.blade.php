<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Sistema de Gestão ERP Online | FinnanceSoft</title>
    </head>
    <body>
        <div style="height: 100%;">
            <header>
                <nav class="content">
                    <ul>
                        <li><a href="" class="highlight"><img src="./img/logoFinnance.png" alt="" width="230"></a></li>
                        <li><a href="" class="hovered">Soluções</a></li>
                        <li><a href="" class="hovered">Recursos do Sistema</a></li>
                        <li class="me"><a href="" class="hovered">Planos e Preços</a></li>
                        <li><a href="" class="btn bg-secondary">Solicite uma proposta</a></li>
                        <li><a href="{{ route('user.create') }}" class="btn bg-tertiary">Experimente grátis</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hovered">Login</a></li>
                    </ul>
                </nav>
            </header>
    
            <main class="pt-5">
                <div class="container">
                    <div class="left-side spacing">
                        <h1>Tudo em um só lugar! Otimize todos os seus processos.</h1>
                        <p>
                            Emita notas fiscais, boletos, controle fluxo de caixa, cadastre contas a pagar e receber e ganhe tempo pra fazer sua empresa crescer de uma forma simples e segura.
                        </p>
    
                        <button class="btn bg-secondary">Solicite uma proposta</button>
                    </div>
                    <div class="right-side">
                        <img src="https://www.omie.com.br/images/home/persona-banner.png" alt="" width="1366">
                    </div>
                </div>
            </main>
        </div>
        

        <section class="segmentos mt-4">
            <div class="container-fluid">
                <p  class="text-tertiary fw-bold fs-2">segmentos</p>

                <h1 class="mt-2">Inovação e crescimentos para todos os portes</h1>

                <p class="mt-2">O único ERP online e completo para indústria, comércio e serviços.</p>

                <ul class="mt-3">
                    <li>
                        <a href="">
                            <div class="card">
                                <img class="card-img" src="https://www.omie.com.br/images/ico-servicos.svg" alt="" width="75">
                                <h5>Serviços em geral</h5>
                                <p>Organização completa das ordens às entregas, em uma única tela.</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <div class="card">
                                <img class="card-img" src="https://www.omie.com.br/images/ico-restaurantes.svg" alt="" width="75">
                                <h5>Alimentação</h5>
                                <p>Compras e estoque integrados para a reposição ideal dos produtos.</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <div class="card">
                                <img class="card-img" src="https://www.omie.com.br/images/ico-varejo.svg" alt="" width="75">
                                <h5>Vendas</h5>
                                <p>Frente de caixa completo e monitoramento das vendas em tempo real.</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <div class="card">
                                <img class="card-img" src="https://www.omie.com.br/images/ico-clinica.svg" alt="" width="75">
                                <h5>Saúde e estética</h5>
                                <p>CRM inteligente para conquistar novos clientes de forma automática.</p>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <div class="card">
                                <img class="card-img" src="https://www.omie.com.br/images/ico-consultoriomed.svg" alt="" width="75">
                                <h5>Logística</h5>
                                <p>Integração para emitir CT-e e controlar de perto toda movimentação.</p>
                            </div>
                        </a>
                    </li>
                </ul>

                <button class="btn bg-secondary mt-4">Segmentos atendidos</button>
            </div>
        </section>
    </body>
</html>