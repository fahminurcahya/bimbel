@extends('layouts.template')

@section('title')
Report
@endsection

@section('content')
  <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Pilih Kelas</div>
                </div><!-- /.box-header -->
                <form class="form-horizontal" method="post" action="{{ route('export-hasil') }}">
                    @csrf
                    <div class="box-body form-horizontal">
                        <div class="col-xs-2">
                        </div>

                        <div class="col-xs-8">
                            <div class="form-group">
                                <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                                <div class="col-sm-9">
                                <select class="form-control" name="kelas" id="kelas" placeholder="kelas">
                                    <option value ="">Pilih Kelas</option>
                                    @forelse($lovkelas as $lovkelas)
                                    <option value="{{  $lovkelas->id_kelas }}">{{  $lovkelas->nama }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right" ><span class="glyphicon glyphicon-file"></span>Export To Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection



