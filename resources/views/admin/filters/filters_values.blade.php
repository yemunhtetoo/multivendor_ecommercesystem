<?php use App\Models\ProductsFilter; ?>
@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
      
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Filters Values</h4>
              <p class="card-description">
                {{-- Add class <code>.table-bordered</code> --}}
              </p>
              <a style="max-width: 150px; float:right; display:inline-block;" href="{{ url('admin/filters') }}" class="btn btn-block btn-primary">View Filters</a>
              <a style="max-width: 150px; float:left; display:inline-block;" href="{{ url('admin/add-edit-filter-value') }}" class="btn btn-block btn-primary">Add Filter Values</a>
              @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong>{{Session::get('success_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
              <div class="table-responsive pt-3">
                <table id="sections" class="table table-bordered">
                  <thead>
                    <tr>
                      
                      <th>
                         ID
                      </th>
                      <th>
                        Filter ID
                      </th>
                      <th>
                        Filter Name
                      </th>
                      <th>
                        Filter Values
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($filters_values as $filter)
                        
                    <tr>
                      <td>
                        {{ $filter['id']}}
                      </td>
                      <td>
                        {{ $filter['filter_id']}}
                      </td>
                      <td>
                        <?php 
                          echo $getFilterName = ProductsFilter::getFilterName($filter['filter_id']);
                        ?>
                      </td>
                      <td>
                        {{ $filter['filter_value']}}
                      </td>
                      <td>
                         @if($filter['status']==1)
                         <a class="updateFilterValueStatus" id="filter-{{ $filter['id']}}" filter_id="{{ $filter['id']}}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i></a> 
                         @else
                         <a class="updateFilterValueStatus" id="filter-{{ $filter['id']}}" filter_id="{{ $filter['id']}}" href="javascript:void(0)"><i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i></a>
                         @endif
                      </td>
                      <td>
                       
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection