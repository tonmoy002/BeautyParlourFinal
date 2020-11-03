@extends('layouts.app')
@section('layouts_content')

<div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form action="{{url('/save-gallery-product')}}" method="post" enctype="multipart/form-data">
              	{{ csrf_field ()}}
                <h4 class="form-header text-uppercase">
                    <i class="fa fa-th" aria-hidden="true"></i>
                  Add Gallery Product
                  </h4>
                <div class="form-group">
                  <label for="input-8">Enter Gallery Product Name</label>
                  <input type="text" name="gallery_product_name"class="form-control" id="input-5">
                </div>

                 <div class="form-group">
                    <label for="input-6">Select Gallery Product Category</label>
                    <select class="form-control" name="gallery_category_id">
                      <option>Select Product Category</option>
                      <?php 
                      	$all_gallery_category=DB::table('tbl_add_gallery_category')
                      						->where('publication_status',1)
                      						->get();
                      		foreach ($all_gallery_category as $pms_gallery_category)
                      {?>
                      <option value="{{$pms_gallery_category->gallery_category_id}}">{{$pms_gallery_category->gallery_category_name}}</option>
                      <?php } ?>
                  </select>
                  </div>

                <div class="form-group">
                  <label for="input-8">Select Cut Image</label>
                  <input type="file" name="gallery_product_img" class="form-control" id="input-8">
                </div>

                <div class="form-group row">
                  <label for="input-8" class="col-sm-6 col-form-label">Publication Status</label>
                  <div class="col-sm-10">
                     <input type="checkbox" name="publication_status"  value="1" id="md_checkbox_2" class="chk-col-success"  />
                     <label for="md_checkbox_2"></label>

                      <p class="mgs"style="color: #09b910;margin-top:-39px;margin-left:36px;font-weight: 600;font-size:16px;">
                       <?php
                        $message=Session::get('message');
                         if($message)
                       {
                        echo $message;
                         Session::flash('message',null );
                        }
                      ?>
                    </p> 
                  </div>
                </div>
               
                <div class="form-footer">
                  <button type="submit" class="btn btn-dark shadow-dark m-1"><i class="fa fa-times"></i> Cancel</button>
                  <button type="submit" class="btn btn-success shadow-success m-1"><i class="fa fa-check-square-o"></i>Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->

@endsection