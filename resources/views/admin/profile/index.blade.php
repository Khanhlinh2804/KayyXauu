@extends('backend.index')
@section('title','Order')
@section('linh')  
<div class="container">
   <div class="row">
        <div class="col-lg-7">
            <table class="table">
                
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>{{Auth::guard('admin')->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
</div>
@endsection