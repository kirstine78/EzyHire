<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            showFaultsReport.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Report of Faults</h2>(Excluding damages on retired vehicles)</div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('#') }}" method="GET" class="form-horizontal">

                        <div class="form-group">
                            <label for="radFilterFaults" class="col-sm-3 control-label">Filter</label>
                            <div class="col-sm-6">
                                <input type="radio" name="radFilterFaults" value="fixedAndUnFixed" id="fixedAndUnFixed" class="preserveWhiteSpace" > Show fixed and un-fixed<br>
                                <input type="radio" name="radFilterFaults" value="onlyUnFixed" id="onlyUnFixed" class="preserveWhiteSpace" > Show only un-fixed<br>
                            </div>
                        </div>
                    </form>

                    @if (count($joinTable) > 0)

                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th>Rego no</th>
                            <th>Fault date</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Fixed</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($joinTable as $j)
                                <tr>
                                    <!-- Rego no -->
                                    <td class="table-text">
                                        <div>{{ $j->fldRegoNo }}</div>
                                    </td>

                                    <!-- Fault date -->
                                    <td class="table-text">
                                        <div>{{ $j->fldFaultDate }}</div>
                                    </td>

                                    <!-- Fault Type -->
                                    <td class="table-text">
                                        <div>{{ $j->fldFaultType }}</div>
                                    </td>

                                    <!-- Fault description -->
                                    <td class="table-text">
                                        <div>{{ $j->fldFaultDescription }}</div>
                                    </td>

                                    <!-- Fixed -->
                                    <td class="table-text">
                                        @if($j->fldFixed)
                                            <div>Yes</div>
                                        @else
                                            <div>No</div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div>There are currently no faults to report</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script type="text/javascript">
        var select1 = document.getElementById('fixedAndUnFixed');
        select1.onchange = function(){
            this.form.submit();
        };

        var select2 = document.getElementById('onlyUnFixed');
        select2.onchange = function(){
            this.form.submit();
        };

        document.getElementById('{{ $filterOption }}').checked=true;
    </script>
@endsection