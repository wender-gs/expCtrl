<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="./img/logoFinnanceIcon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        @vite('resources/scss/style.scss')
        @vite('resources/css/dash.css')
        @vite('resources/scss/media-querys.scss')
        <title>FinnanceSoft | Dashboard</title>
    </head>
    <body>

        @if (isset($_GET['report']) && $_GET['report'] === 'regFailed')
            <div class="alert alert-danger alert-dismissible fade show w-25 alert-div" role="alert">
                <strong>Erro</strong> ao cadastrar a despesa
            </div>
        @endif

        <header>
            {{-- sidebar inicio --}}
            <div class="sidebar | d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="#" class="my-brand">
                    <img id="brand" src="./img/logoFinnance.png" alt="" width="230">
                </a>
                <hr>
                <ul class="nav flex-column mb-auto text-start">
                    {{-- dash btn inicio --}}
                    <li class="nav-item active mb-2">
                        <a href="" class="nav-link text-white">
                            <i class="bi bi-speedometer2 me-2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    {{-- dash btn fim --}}

                    {{-- novo btn inicio --}}
                    <li class="mb-2">
                        <a data-bs-target="#dropMenu" onclick="rotateDropIcon('drop-new')" class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" role="button">
                            <i class="bi bi-plus-circle-dotted me-2"></i>
                            <span>Novo</span>
                            <i id="drop-new" class="fa-solid fa-angle-up ms-auto drop-icon"></i>
                        </a>
                    </li>
                    <div id="dropMenu" class="collapse">
                        <ul class="list-unstyled ps-5">
                            <li class="p-2 me-3">
                                <a href="#" class="text-white d-block" data-bs-toggle="modal" data-bs-target="#modalRecipe">
                                    <i class="fa-solid fa-arrow-trend-up me-2"></i>
                                    <span>Receitas</span>
                                </a>
                            </li>
                            <li class="p-2 me-3">
                                <a href="#" class="text-white d-block" data-bs-toggle="modal" data-bs-target="#modalExpense">
                                    <i class="fa-solid fa-arrow-trend-down me-2"></i>
                                    <span>Despesa</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    {{-- novo btn fim --}}

                    {{-- transações inicio --}}
                    <li class="mb-2">
                        <a href="{{ route('admin.transaction') }}" class="nav-link text-white">
                            <i class="fa-solid fa-list me-2"></i>
                            <span>Transações</span>
                        </a>
                    </li>
                    {{-- transações fim --}}
                    <li class="mb-2">
                        <a href="" class="nav-link text-white">
                            <i class="fa-solid fa-boxes-stacked me-2"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="nav-link text-white">
                            <i class="fa-regular fa-circle-user me-2"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white dropdown-toggle text-decoration-none" data-bs-toggle="dropdown" data-bs-target="#dropDownUser" aria-expanded="false">
                        <img src="https://lh3.googleusercontent.com/a-/AFdZucp89OTg71-gvCmzEYF5vuwV2sI1pa4FOA7Z-8A=s96-c-rg-br100" alt="" width="32" class="roudend-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-small shadow overflow-hidden" id="dropDownUser">
                        <li><a href="#" class="dropdown-item">New Project</a></li>
                        <li><a href="#" class="dropdown-item">Settings</a></li>
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a href="{{ route('admin.logout') }}" class="dropdown-item">Sign Out</a></li>
                    </ul>
                </div>
            </div>
            {{-- sidebar fim --}}
        </header>
        
        <main class="content">
            {{-- topo inicio --}}
            <section>
                <div class="d-flex justify-content-center">
                    <div class="d-flex align-items-center justify-content-center border rounded-pill px-4 py-2 pointer">
                        <span class="me-2">Julho</span>
                        <i class="fa-solid fa-angle-down"></i>    
                    </div>
                </div>
            </section>
            {{-- topo fim --}}

            {{-- dashboard inicio --}}
            <section class="mt-4 container">
                <h5 class="fs-2">Dashboard</h5>
                <div class="row gx-2 mt-4">
                    {{-- saldo do mes inicio --}}
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('admin.transaction') }}" class="d-flex justify-content-between align-items-center rounded p-4 mb-2 box-shadow">
                            <div>
                                <span class="text-secondary">Saldo</span>
                                <h4 class="p-0 m-0 text-primary">$ {{ number_format(($totalRecipe - $totalExpenses), 2, ',', '.') }}</h4>
                            </div>
                            <div>
                                <span class="bg-primary rounded-circle p-3"><i class="fa-solid fa-building-columns text-white"></i></span>
                            </div>
                        </a>
                    </div>
                    {{-- saldo do mes final --}}

                    {{-- receitas inicio --}}
                    <div class="col-md-6 col-lg-4">
                        <a href="" class="d-flex justify-content-between align-items-center rounded p-4 mb-2 box-shadow">
                            <div>
                                <span class="text-secondary">Receitas</span>
                                <h4 class="p-0 m-0 text-success">$ {{ number_format($totalRecipe, 2, ',', '.') }}</h4>
                            </div>
                            <div>
                                <span class="bg-success rounded-circle p-3"><i class="fa-solid fa-arrow-trend-up text-white"></i></span>
                            </div>
                        </a>
                    </div>
                    {{-- receitas fim --}}

                    {{-- despesas inicio --}}
                    <div class="col-md-6 col-lg-4">
                        <a href="" class="d-flex justify-content-between align-items-center rounded p-4 mb-2 box-shadow">
                            <div>
                                <span class="text-secondary">Despesas</span>
                                <h4 class="p-0 m-0 text-danger">$ {{ number_format($totalExpenses, 2, ',', '.') }}</h4>
                            </div>
                            <div>
                                <span class="bg-danger rounded-circle p-3"><i class="fa-solid fa-arrow-trend-down text-white"></i></i></span>
                            </div>
                        </a>
                    </div>
                    {{-- despesas fim --}}
                </div>
            </section>
            {{-- dashboard fim --}}

            {{-- balanço inicio --}}
            <section class="container">
                <h5 class="fs-2 fw-light mt-5">Balanço Anual</h5>
                <div class="row gx-2 mt-3">
                    {{-- balanço anual inicio --}}
                    <div class="col-md-12 col-lg-6 mb-3">
                        <div class="d-flex rounded box-shadow p-3">
                            {{-- graph inicio --}}
                            <div class="left-content mb-3 mt-2">
                                <div class="div-chart ">
                                    <!-- receita -->
                                    <div class="chart">
                                        <div class="chart-icon bg-success w-receita" style="height:45px"></div>
                                    </div>
            
                                    <!-- despesa -->
                                    <div class="chart">
                                        <div class="chart-icon bg-danger w-despesa" style="height:30px"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- graph fim --}}

                            {{-- valores inicio --}}
                            <div class="right-content">
                                <div class="info-rent">
                                    <span class="fw-bold fs-5 text-secondary">Receitas</span>
                                    <span class="text-success fs-5 fw-bold">R$ 0,00</span>
                                </div>
                                <div class="info-expense">
                                    <span class="fw-bold fs-5 text-secondary">Despesa</span>
                                    <span class="text-danger fs-5 fw-bold">R$ 0,00</span>
                                </div>
                                <div class="info-balanco">
                                    <span class="fw-bold fs-5 text-secondary">Balanço</span>
                                    <span class="fw-bold text-secondary fs-5">R$ 0,00</span>
                                </div>
                            </div>
                            {{-- valores fim --}}
                        </div>
                    </div>
                    {{-- balanco anual fim --}}

                    {{-- categorias inicio --}}
                    <div class="col-md-12 col-lg-6">
                        <div class="d-flex rounded box-shadow p-3">
                            {{-- graph inicio --}}
                            <div class="left-content mb-3 mt-2">
                                <div class="div-chart ">
                                    <!-- receita -->
                                    <div class="chart">
                                        <div class="chart-icon bg-success w-receita" style="height:45px"></div>
                                    </div>
            
                                    <!-- despesa -->
                                    <div class="chart">
                                        <div class="chart-icon bg-danger w-despesa" style="height:30px"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- graph fim --}}

                            {{-- valores inicio --}}
                            <div class="right-content">
                                <div class="info-rent">
                                    <span class="fw-bold fs-5 text-secondary">Receitas</span>
                                    <span class="text-success fs-5 fw-bold">R$ 0,00</span>
                                </div>
                                <div class="info-expense">
                                    <span class="fw-bold fs-5 text-secondary">Despesa</span>
                                    <span class="text-danger fs-5 fw-bold">R$ 0,00</span>
                                </div>
                                <div class="info-balanco">
                                    <span class="fw-bold fs-5 text-secondary">Balanço</span>
                                    <span class="fw-bold text-secondary fs-5">R$ 0,00</span>
                                </div>
                            </div>
                            {{-- valores fim --}}
                        </div>
                    </div>
                    {{-- categorias fim --}}
                </div>
            </section>
            {{-- balanço fim --}}
        </main>

        {{-- modal de receita inicio --}}
        <div class="modal fade" id="modalRecipe" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content rounded-2 p-3">
                    <div class="modal-header border-0 p-1">
                        <h5 class="modal-title" id="exampleModalLabel">Nova Receita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.store.recipe', ['id' => Auth::user()->id, 'type' => 'recipe']) }}" method="POST">
                            @csrf
                            {{-- valor inicio --}}
                            <div class="input-group">
                                <i class="fa-solid fa-calculator first-icon"></i>
                                <input type="text" class="text-success modalEntry mt-2" name="value" id="value" placeholder="R$" autocomplete="off">
                            </div>
                            {{-- valor final --}}

                            {{-- checkbox de verificação inicio --}}
                            <div class="row mt-4">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="bi bi-check2-circle me-3" style="font-size: 1.1rem; color:#9d9d9d;"></i>
                                    <label id="isPaidText" for="isPaid" onclick="isPaid('isPaid', 'isPaidText')">Pago</label>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <input type="checkbox" name="isPaid" id="isPaid" checked class=" checkbox rent d-none">
                                    <label onclick="isPaid('isPaid', 'isPaidText')" for="isPaid" class="switch"></label>
                                </div>
                            </div>
                            {{-- checkbox de vereficação final --}}

                            {{-- data inicio --}}
                            <div class="input-group">
                                <i class="bi bi-calendar-event third-icon"></i>
                                <input type="date" class="text-success modalEntry mt-4" name="date" id="date">
                            </div>
                            {{-- data final --}}

                            {{-- pagador inicio --}}
                            <div class="input-group">
                                <i class="bi bi-receipt icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="payer" id="payer" placeholder="Pagador">
                            </div>
                            {{-- pagador fim --}}

                            {{-- categoria inicio --}}
                            <div class="input-group">
                                <i class="bi bi-bookmark icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="cat" id="cat" placeholder="Categorias">
                            </div>
                            {{-- categoria fim --}}

                            {{-- wallet inicio --}}
                            <div class="input-group">
                                <i class="bi bi-wallet2 icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="wallet" id="wallet" placeholder="Carteira">
                            </div>
                            {{-- categoria fim --}}

                            {{-- button submit --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success w-25 mt-3">SALVAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal de receita fim --}}

        {{-- modal de despesa inicio --}}
        <div class="modal fade" id="modalExpense" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content rounded-2 p-3">
                    <div class="modal-header border-0 p-1">
                        <h5 class="modal-title">Nova Despesa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.store.expense', ['id' => Auth::user()->id, 'type' => 'expense']) }}" method="POST">
                            @csrf
                            {{-- valor inicio --}}
                            <div class="input-group">
                                <i class="fa-solid fa-calculator first-icon"></i>
                                <input type="text" class="text-danger modalEntry mt-2" name="value_expense" id="value_expense" placeholder="R$" autocomplete="off">
                            </div>
                            {{-- valor final --}}

                            {{-- checkbox de verificação inicio --}}
                            <div class="row mt-4">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="bi bi-check2-circle me-3" style="font-size: 1.1rem; color:#9d9d9d;"></i>
                                    <label id="isPaidTextExpense" for="isPaidExpense" onclick="isPaid('isPaidExpense', 'isPaidTextExpense')">Pago</label>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <input type="checkbox" name="isPaid" id="isPaidExpense" checked class=" checkbox expense d-none">
                                    <label onclick="isPaid('isPaidExpense', 'isPaidTextExpense')" for="isPaidExpense" class="switch"></label>
                                </div>
                            </div>
                            {{-- checkbox de vereficação final --}}

                            {{-- data inicio --}}
                            <div class="input-group">
                                <i class="bi bi-calendar-event third-icon"></i>
                                <input type="date" class="text-danger modalEntry mt-4" name="dateExpense" id="dateExpense">
                            </div>
                            {{-- data final --}}

                            {{-- pagador inicio --}}
                            <div class="input-group">
                                <i class="bi bi-receipt icones"></i>
                                <input type="text" class="text-danger modalEntry mt-5" name="payerExpense" id="payerExpense" placeholder="Beneficiário">
                            </div>
                            {{-- pagador fim --}}

                            {{-- categoria inicio --}}
                            <div class="input-group">
                                <i class="bi bi-bookmark icones"></i>
                                <input type="text" class="text-danger modalEntry mt-5" name="catExpense" id="catExpense" placeholder="Categorias">
                            </div>
                            {{-- categoria fim --}}

                            {{-- wallet inicio --}}
                            <div class="input-group">
                                <i class="bi bi-wallet2 icones"></i>
                                <input type="text" class="text-danger modalEntry mt-5" name="walletExpense" id="walletExpense" placeholder="Carteira">
                            </div>
                            {{-- categoria fim --}}

                            {{-- button submit --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger w-25 mt-3">SALVAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal de despesa fim --}}



        <!-- JavaScript Bundle with Popper and jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @vite(['node_modules/jquery/dist/jquery.js'])
        @vite('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')
        
        <script>
            // função para girar o icone do dropdown
            function rotateDropIcon(id) {
                $(`#${id}`).toggleClass('rotate')
            }

            // função para alterar o valor do innerHTML do isPaid dentro do modal
            function isPaid(id, textId) {
                const elementIsPaid = $(`#${id}`);

                if(!(elementIsPaid.prop('checked') === true)){
                    $(`#${textId}`).text('Pago');

                }else {
                    $(`#${textId}`).text('Pendente');
                }
            }

            // função para sumir o alert depois de um determinado tempo
            setTimeout(() => {
                $('.alert-div').fadeOut('slow');
            }, 2000);
        </script>
    </body>
</html>