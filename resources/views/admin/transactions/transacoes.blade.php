<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="../img/logoFinnanceIcon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        @vite('resources/scss/style.scss')
        @vite('resources/css/dash.css')
        @vite('resources/scss/media-querys.scss')
        <title>FinnanceSoft | Transações</title>
    </head>
    <body>

        <header>
            {{-- sidebar inicio --}}
            <div class="sidebar | d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
                <a href="{{ route('admin') }}" class="my-brand">
                    <img id="brand" src="../img/logoFinnance.png" alt="" width="230">
                </a>
                <hr>
                <ul class="nav flex-column mb-auto text-start">
                    {{-- dash btn inicio --}}
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin') }}" class="nav-link text-white">
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
                    <li class="mb-2 active">
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
        
        {{-- main inicio --}}
        <main class="content pt-5">
            {{-- topo inicio --}}
            <section class="container">
                <div class="row pt-4">
                    <div class="col-md-6 d-flex align-items-center">
                        <button class="btn btn-dark btn-width py-3 rounded-pill">
                            <i class="fa-solid fa-angle-down me-2"></i>
                            <span class="fw-bold">Transações</span>
                        </button>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end filter-box">
                        <a href="#" class="text-black">
                            <i class="bi bi-funnel rounded-circle box-shadow filter p-3"></i>
                        </a>
                    </div>
                </div>
            </section>
            {{-- topo final --}}

            {{-- cartões inicio --}}
            <section class="container">
                <div class="row gx-2 mt-5">
                    {{-- saldo do mes inicio --}}
                    <div class="col-md-6 col-lg-4">
                        <a href="" class="d-flex justify-content-between align-items-center rounded p-4 mb-2 box-shadow">
                            <div>
                                <span class="text-secondary">Saldo</span>
                                <h4 class="p-0 m-0 text-primary">$ {{number_format(($totalRecipe - $totalExpense), 2, ',', '.')}}</h4>
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
                                <h4 class="p-0 m-0 text-success">$ {{number_format($totalRecipe, 2, ',', '.')}}</h4>
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
                                <h4 class="p-0 m-0 text-danger">$ {{ number_format($totalExpense, 2, ',', '.') }}</h4>
                            </div>
                            <div>
                                <span class="bg-danger rounded-circle p-3"><i class="fa-solid fa-arrow-trend-down text-white"></i></i></span>
                            </div>
                        </a>
                    </div>
                    {{-- despesas fim --}}
                </div>
            </section>
            {{-- cartões final --}}

            <section class="container mt-4">
                <div class="row gx-2 mt-3">
                    {{-- tabela de transações inicio --}}
                    <div class="col-md-12 col-lg-12">
                        <div class="d-flex rounded box-shadow overflow-hidden">
                            <table class="w-100">
                                <thead class="thead">
                                    <tr>
                                        <th class="py-3 text-secondary text-center">Situação</th>
                                        <th class="py-3 text-secondary text-center">Data</th>
                                        <th class="py-3 text-secondary text-center">Descrição</th>
                                        <th class="py-3 text-secondary text-center ocult">Categoria</th>
                                        <th class="py-3 text-secondary text-center ocult">Conta</th>
                                        <th class="py-3 text-secondary text-center">Valor</th>
                                        <th class="py-3 text-secondary text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transations as $transation)
                                        <tr>
                                            <td class="text-center text-white">
                                                @if (!($transation->isPaid))
                                                    <i class="bi bi-check rounded-circle box-shadow p-1 bg-success"></i>
                                                @else
                                                    <i class="bi bi-exclamation rounded-circle box-shadow p-1 bg-danger"></i>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ date('d/m/Y', strtotime($transation->transactionDate))}}</td>
                                            <td class="text-center text-capitalize">{{$transation->drawer}}</td>
                                            <td class="text-center text-capitalize ocult">{{ $transation->category}}</td>
                                            <td class="text-center text-capitalize ocult">{{ $transation->wallet}}</td>
                                            <td class="text-center text-capitalize {{ $transation->transactionIdentifier === 'expense' ? 'text-danger' : 'text-success' }}">R$ {{ number_format($transation->transactionValue, 2, ',', '.')}}</td>
                                            <td class="text-end">
                                                @if ($transation->isPaid)
                                                    <a href="{{ route('admin.transaction.updateStatus', ['id' => $transation->id, 'type' => $transation->transactionIdentifier]) }}"><i class="bi bi-check2-circle me-2 text-success"></i></a>
                                                @endif
                                                <a href="{{ route('admin.transaction.delete', ['id' => $transation->id, 'type' => $transation->transactionIdentifier]) }}"><i class="bi bi-trash me-2 text-danger"></i></a>
                                                <a onclick="getData({{ $transation->id }})" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="{{ $transation->transactionIdentifier === 'expense' ? '#modalExpense' : '#modalRecipeUpdate'}}"><i class="bi bi-pencil text-info"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- tabela de transações fim --}}
                </div>
            </section>
        </main>
        {{-- main fim --}}

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
                                    <input type="checkbox" name="isPaid" checked id="isPaid" class=" checkbox rent d-none">
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

        {{-- modal de receita update --}}
        <div class="modal fade" id="modalRecipeUpdate" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content rounded-2 p-3">
                    <div class="modal-header border-0 p-1">
                        <h5 class="modal-title" id="modalUpdate">Atualizar Receita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            {{-- valor inicio --}}
                            <div class="input-group">
                                <i class="fa-solid fa-calculator first-icon"></i>
                                <input type="text" class="text-success modalEntry mt-2" name="value" id="value-update" placeholder="R$" autocomplete="off">
                            </div>
                            {{-- valor final --}}

                            {{-- checkbox de verificação inicio --}}
                            <div class="row mt-4">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="bi bi-check2-circle me-3" style="font-size: 1.1rem; color:#9d9d9d;"></i>
                                    <label id="isPaidText" for="isPaid" onclick="isPaid('isPaid', 'isPaidText')">Pago</label>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-end">
                                    <input type="checkbox" name="isPaid" checked id="isPaid" class=" checkbox rent d-none">
                                    <label onclick="isPaid('isPaid', 'isPaidText')" for="isPaid" class="switch"></label>
                                </div>
                            </div>
                            {{-- checkbox de vereficação final --}}

                            {{-- data inicio --}}
                            <div class="input-group">
                                <i class="bi bi-calendar-event third-icon"></i>
                                <input type="date" class="text-success modalEntry mt-4" name="date" id="date-update">
                            </div>
                            {{-- data final --}}

                            {{-- pagador inicio --}}
                            <div class="input-group">
                                <i class="bi bi-receipt icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="payer" id="payer-update" placeholder="Pagador">
                            </div>
                            {{-- pagador fim --}}

                            {{-- categoria inicio --}}
                            <div class="input-group">
                                <i class="bi bi-bookmark icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="cat" id="cat-update" placeholder="Categorias">
                            </div>
                            {{-- categoria fim --}}

                            {{-- wallet inicio --}}
                            <div class="input-group">
                                <i class="bi bi-wallet2 icones"></i>
                                <input type="text" class="text-success modalEntry mt-5" name="wallet" id="wallet-update" placeholder="Carteira">
                            </div>
                            {{-- categoria fim --}}

                            {{-- button submit --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success w-25 mt-3">ATUALIZAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal de receita update fim --}}

        <!-- JavaScript Bundle with Popper and jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @vite('node_modules/jquery/dist/jquery.js')
        @vite('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')
        @vite('resources/ts/main.ts')

        <script>
            // função para girar o icone do dropdown
            function rotateDropIcon(id) {
                $(`#${id}`).toggleClass('rotate')
            }

            // função para alterar o valor do innerHTML do isPaid dentro do modal
            function isPaid(id, textId) {
                const elementIsPaid = $(`#${id}`);

                if(elementIsPaid.prop('checked')){
                    $(`#${textId}`).text('Pendente');
                }else {
                    $(`#${textId}`).text('Pago');
                }
            }

            // função para sumir o alert depois de um determinado tempo
            setTimeout(() => {
                $('.alert-div').fadeOut('slow');
            }, 2000);

            // função para recuperar valores a serem atualizados
            function getData(id) {
                const xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = () => {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        const data = JSON.parse(xhttp.responseText);
                        document.querySelector("#value-update").value = data[0].transactionValue.toFixed(2);
                        document.querySelector("#date-update").value = data[0].transactionDate;
                        document.querySelector("#payer-update").value = data[0].drawer;
                        document.querySelector("#cat-update").value = data[0].category;
                        document.querySelector("#wallet-update").value = data[0].wallet;
                        console.log(data);
                    }
                }

                xhttp.open('GET', `http://localhost:8000/admin/transacoes/${id}/getUpdade`);
                xhttp.send();
            }

        </script>
    </body>
</html>