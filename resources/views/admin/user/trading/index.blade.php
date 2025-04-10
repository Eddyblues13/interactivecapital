@include('admin.header')
<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Manage Trades for {{ $user->name }}</h1>
            </div>
            <div>
                <div class="mb-5 row">
                    <div class="col-lg-12">
                        <div class="p-3 card bg-dark">
                            <form action="{{ route('admin.trades.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Trader</h5>
                                        <select name="trader_name" class="form-control text-light bg-dark" required>
                                            @foreach($traders as $trader)
                                            <option value="{{ $trader->name }}">{{ $trader->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Symbol</h5>
                                        <select name="symbol" id="symbol" class="form-control text-light bg-dark"
                                            required>
                                            @foreach($symbols as $symbol)
                                            <option value="{{ $symbol }}">{{ $symbol }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Type</h5>
                                        <select name="type" class="form-control text-light bg-dark" required>
                                            <option value="spot">Spot</option>
                                            <option value="futures">Futures</option>
                                            <option value="margin">Margin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Direction</h5>
                                        <select name="direction" class="form-control text-light bg-dark" required>
                                            <option value="up">Long (UP)</option>
                                            <option value="down">Short (DOWN)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Entry Price</h5>
                                        <input type="number" step="0.0001" class="form-control text-light bg-dark"
                                            name="entry_price" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <h5 class="text-light">Amount</h5>
                                        <input type="number" step="0.01" class="form-control text-light bg-dark"
                                            name="amount" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <h5 class="text-light">Entry Date</h5>
                                        <input type="datetime-local" class="form-control text-light bg-dark"
                                            name="entry_date" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="text-light">Status</h5>
                                        <select name="status" class="form-control text-light bg-dark" required>
                                            <option value="active">Active</option>
                                            <option value="closed">Closed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row" id="closed-fields" style="display: none;">
                                    <div class="form-group col-md-6">
                                        <h5 class="text-light">Exit Price</h5>
                                        <input type="number" step="0.0001" class="form-control text-light bg-dark"
                                            name="exit_price">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5 class="text-light">Exit Date</h5>
                                        <input type="datetime-local" class="form-control text-light bg-dark"
                                            name="exit_date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5 class="text-light">Notes</h5>
                                    <textarea class="form-control text-light bg-dark" name="notes" rows="2"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary px-4">Create Trade</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mb-5 row">
                    <div class="col card p-3 shadow bg-dark">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">
                                <table id="ShipTable" class="table table-hover text-light">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Symbol</th>
                                            <th>Trader</th>
                                            <th>Type</th>
                                            <th>Direction</th>
                                            <th>Amount</th>
                                            <th>Entry Price</th>
                                            <th>Exit Price</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                            <th>Entry Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trades as $trade)
                                        <tr>
                                            <th scope="row">{{ $trade->id }}</th>
                                            <td>{{ $trade->symbol }}</td>
                                            <td>{{ $trade->trader_name }}</td>
                                            <td>{{ ucfirst($trade->type) }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $trade->direction === 'up' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ strtoupper($trade->direction) }}
                                                </span>
                                            </td>
                                            <td>{{ $trade->formattedAmount }}</td>
                                            <td>{{ number_format($trade->entry_price, 4) }}</td>
                                            <td>{{ $trade->exit_price ? number_format($trade->exit_price, 4) : 'N/A' }}
                                            </td>
                                            <td class="{{ $trade->profit >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $trade->profit ? $trade->formattedProfit : 'N/A' }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge {{ $trade->status === 'active' ? 'badge-primary' : 'badge-secondary' }}">
                                                    {{ ucfirst($trade->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $trade->entry_date->format('M j, Y H:i') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editTradeModal{{ $trade->id }}">
                                                    Edit
                                                </button>

                                                <form action="{{ route('admin.trades.destroy', $trade->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Edit Trade Modal -->
                                        <div class="modal fade" id="editTradeModal{{ $trade->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editTradeModalLabel{{ $trade->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content bg-dark text-light">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editTradeModalLabel{{ $trade->id }}">Edit Trade #{{
                                                            $trade->id }}</h5>
                                                        <button type="button" class="close text-light"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.trades.update', $trade->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Trader</label>
                                                                    <select name="trader_name"
                                                                        class="form-control text-light bg-dark"
                                                                        required>
                                                                        @foreach($traders as $trader)
                                                                        <option value="{{ $trader->trader_name }}" {{
                                                                            $trade->trader_name === $trader->trader_name
                                                                            ? 'selected' : '' }}>
                                                                            {{ $trader->trader_name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Symbol</label>
                                                                    <select name="symbol"
                                                                        class="form-control text-light bg-dark"
                                                                        required>
                                                                        @foreach($symbols as $symbol)
                                                                        <option value="{{ $symbol }}" {{ $trade->symbol
                                                                            === $symbol ? 'selected' : '' }}>
                                                                            {{ $symbol }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Type</label>
                                                                    <select name="type"
                                                                        class="form-control text-light bg-dark"
                                                                        required>
                                                                        <option value="spot" {{ $trade->type === 'spot'
                                                                            ? 'selected' : '' }}>Spot</option>
                                                                        <option value="futures" {{ $trade->type ===
                                                                            'futures' ? 'selected' : '' }}>Futures
                                                                        </option>
                                                                        <option value="margin" {{ $trade->type ===
                                                                            'margin' ? 'selected' : '' }}>Margin
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Direction</label>
                                                                    <select name="direction"
                                                                        class="form-control text-light bg-dark"
                                                                        required>
                                                                        <option value="up" {{ $trade->direction === 'up'
                                                                            ? 'selected' : '' }}>Long (UP)</option>
                                                                        <option value="down" {{ $trade->direction ===
                                                                            'down' ? 'selected' : '' }}>Short (DOWN)
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Status</label>
                                                                    <select name="status" id="status-{{ $trade->id }}"
                                                                        class="form-control text-light bg-dark"
                                                                        required>
                                                                        <option value="active" {{ $trade->status ===
                                                                            'active' ? 'selected' : '' }}>Active
                                                                        </option>
                                                                        <option value="closed" {{ $trade->status ===
                                                                            'closed' ? 'selected' : '' }}>Closed
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-4">
                                                                    <label>Amount</label>
                                                                    <input type="number" step="0.01"
                                                                        class="form-control bg-dark text-light"
                                                                        name="amount"
                                                                        value="{{ old('amount', $trade->amount) }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Entry Price</label>
                                                                    <input type="number" step="0.0001"
                                                                        class="form-control bg-dark text-light"
                                                                        name="entry_price"
                                                                        value="{{ old('entry_price', $trade->entry_price) }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label>Profit</label>
                                                                    <input type="number" step="0.01"
                                                                        class="form-control bg-dark text-light"
                                                                        name="profit"
                                                                        value="{{ old('profit', $trade->profit) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Entry Date</label>
                                                                    <input type="datetime-local"
                                                                        class="form-control bg-dark text-light"
                                                                        name="entry_date"
                                                                        value="{{ old('entry_date', $trade->entry_date->format('Y-m-d\TH:i')) }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group col-md-6 closed-field"
                                                                    style="{{ $trade->status !== 'closed' ? 'display:none;' : '' }}">
                                                                    <label>Exit Date</label>
                                                                    <input type="datetime-local"
                                                                        class="form-control bg-dark text-light"
                                                                        name="exit_date"
                                                                        value="{{ old('exit_date', $trade->exit_date ? $trade->exit_date->format('Y-m-d\TH:i') : '') }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-row">
                                                                <div class="form-group col-md-6 closed-field"
                                                                    style="{{ $trade->status !== 'closed' ? 'display:none;' : '' }}">
                                                                    <label>Exit Price</label>
                                                                    <input type="number" step="0.0001"
                                                                        class="form-control bg-dark text-light"
                                                                        name="exit_price"
                                                                        value="{{ old('exit_price', $trade->exit_price) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Notes</label>
                                                                <textarea class="form-control bg-dark text-light"
                                                                    name="notes"
                                                                    rows="2">{{ old('notes', $trade->notes) }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save
                                                                Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show/hide closed trade fields based on status selection
        document.querySelector('select[name="status"]').addEventListener('change', function() {
            const closedFields = document.getElementById('closed-fields');
            closedFields.style.display = this.value === 'closed' ? 'block' : 'none';
        });
        
        // For edit modals
        document.querySelectorAll('[id^="status-"]').forEach(select => {
            select.addEventListener('change', function() {
                const modalId = this.id.split('-')[1];
                const closedFields = document.querySelectorAll(`#editTradeModal${modalId} .closed-field`);
                closedFields.forEach(field => {
                    field.style.display = this.value === 'closed' ? 'block' : 'none';
                });
            });
        });
        
        // Initialize datetime fields with current time
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            const timezoneOffset = now.getTimezoneOffset() * 60000;
            const localISOTime = (new Date(now - timezoneOffset)).toISOString().slice(0, 16);
            
            document.querySelector('input[name="entry_date"]').value = localISOTime;
            
            // For edit modals, initialize their status change handlers
            document.querySelectorAll('[id^="status-"]').forEach(select => {
                const event = new Event('change');
                select.dispatchEvent(event);
            });
        });
    </script>
    @include('admin.footer')