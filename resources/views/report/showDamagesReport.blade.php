<!--
    Student name:    Kirstine Brørup Nielsen
    Student id:      100527988
    Date:            18.10.2016
    Assignment:      EzyHire
    Version:         1.0
    File:            showDamagesReport.blade.php
-->

@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Report of Damages</h2>(Excluding damages on retired vehicles)</div>

                <div class="panel-body">
                    <!--  form -->
                    <form action="{{ url('#') }}" method="GET" class="form-horizontal">

                        <div class="form-group">
                            <label for="radFilterDamages" class="col-sm-3 control-label">Filter</label>
                            <div class="col-sm-6">
                                <input type="radio" name="radFilterDamages" value="fixedAndUnFixed" id="fixedAndUnFixed" class="preserveWhiteSpace" > Show fixed and un-fixed<br>
                                <input type="radio" name="radFilterDamages" value="onlyUnFixed" id="onlyUnFixed" class="preserveWhiteSpace" > Show only un-fixed<br>
                            </div>
                        </div>
                    </form>

                    @if (count($unionTableArchivedAndNonArchived) > 0)

                        <table class="table table-striped task-table">
                            <!-- Table Headings -->
                            <thead>
                            <th>Rego no</th>
                            <th>Damage date</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Fixed</th>
                            </thead>

                            <!-- Table Body -->
                            <tbody>
                            @foreach($unionTableArchivedAndNonArchived as $u)
                                <tr>
                                    <!-- Rego no -->
                                    <td class="table-text">
                                        <div>{{ $u->regoNo }}</div>
                                    </td>

                                    <!-- Damage date -->
                                    <td class="table-text">
                                        <div>{{ $u->damageDate }}</div>
                                    </td>

                                    <!-- damage Type -->
                                    <td class="table-text">
                                        <div>{{ $u->damageType }}</div>
                                    </td>

                                    <!-- Damage description -->
                                    <td class="table-text">
                                        <div>{{ $u->damageDescription }}</div>
                                    </td>

                                    <!-- Fixed -->
                                    <td class="table-text">
                                        @if($u->fixed)
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
                        <div>There are currently no damages to report</div>
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