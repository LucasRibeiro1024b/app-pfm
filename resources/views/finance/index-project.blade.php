<div id="finances" class="ps-5">

    <div id="finances-header" class="row mb-4">

        <h3 class="col-6 offset-3">Movimentações</h3>

    </div>

    <div id="finances-list" class="overflow-auto border border-secondary-subtle rounded" style="height: 220px;">
        <table class="table text-center">
            <thead>
                <tr class="align-middle lh-sm">
                    <th scope="col">tipo</th>
                    <th scope="col">título</th>
                    <th scope="col">valor</th>
                    <th scope="col" class="col-1">data pagamento</th>
                    <th scope="col" class="col-2">data vencimento</th>
                    {{-- IMPORTANTE: mudar category para finance quando tiver suas policies --}}
                    @can('action', 'App\Models\Expense')
                        <th scope="col">ações</th>
                    @endcan
                </tr>
            </thead>
            <tbody class="table-group-divider">

                {{-- fazer foreach de rpoject->receipts e de project->expenses, ao inves de toda a movimentacao financeira... --}}
                @foreach ($project->receipts as $receipt)
                    <tr class="align-middle">
                        <td>Receita</td>
                        <td>{{ $receipt->title }}</td>
                        <td>R${{ number_format($receipt->value, 2, ',', '.') }}</td>
                        <td>{{ $receipt->payment_date ? $receipt->payment_date : 'Aguardando Pagamento' }}</td>
                        <td>{{ $receipt->end_date }}</td>

                        @can('action', 'App/Models/Expense')
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('receipt.edit', $receipt->id) }}"
                                        class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>

                                    @include('components.modal.delete', [
                                        'route' => 'receipt.destroy',
                                        'name' => $receipt->title,
                                        'id' => $receipt->id,
                                    ])
                                </div>
                            </td>
                        @endcan

                    </tr>
                @endforeach

                @foreach ($project->expenses as $expense)
                    <tr class="align-middle">
                        <td>Despesa</td>
                        <td>{{ $expense->title }}</td>
                        <td>R${{ number_format($expense->value, 2, ',', '.') }}</td>
                        <td>{{ $expense->payment_date ? $expense->payment_date : 'Aguardando Pagamento' }}</td>
                        <td>{{ $expense->end_date }}</td>

                        @can('action', 'App/Models/Expense')
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('expense.edit', $expense->id) }}"
                                        class="btn btn-outline-primary me-1"><i class="material-icons">edit</i></a>
                                    @include('components.modal.delete', [
                                        'route' => 'expense.destroy',
                                        'name' => $expense->title,
                                        'id' => $expense->id,
                                    ])
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
