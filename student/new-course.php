
<?php
    $new_course = 'active';

?>
                <!-- Content -->
                <div class="mdk-header-layout__content mdk-header-layout__content--fullbleed mdk-header-layout__content--scrollable page" style="padding-top: 60px;">


                    <div class="page__heading border-bottom">
                        <div class="container-fluid page__container d-flex align-items-center">
                            <h1 class="mb-0">Courses</h1>
                            <a href="" class="btn btn-success ml-auto"><i class="material-icons">add</i> Publish</a>
                            
                        </div>
                        <div class="mb-1 ml-5">
                            <a href="admin-courses.html" class="badge badge-dark-gray text-white" onclick="goBack()">Back to Courses</a>
                        </div>
                    </div>
                    <div class="bg-white border-bottom mb-3">
                        <div class="container-fluid nav nav-tabs" role="tablist">
                            <a href="#c-basic" class="active" data-toggle="tab" role="tab" aria-controls="activity_all" aria-selected="true">Basic</a>
                            <a href="#c-curriculum" data-toggle="tab" role="tab" aria-selected="false">Curriculum</a>
                            <a href="#c-pricing" data-toggle="tab" role="tab" aria-selected="false">Pricing</a>

                        </div>
                    </div>
                
                    <div class="container-fluid page__container">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="c-basic">
                                <!-- FIRST TAB CONTENT -->
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter course name ..">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Course Description</label>
                                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter course description.."></textarea>
                                    </div>
                                    <div class="form-group" data-select2-id="16">
                                        <label for="select01">Course Category</label>
                                        <select id="select01" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                            <option selected="" data-select2-id="2">Finance</option>
                                            <option data-select2-id="19">Customer Care</option>
                                            <option data-select2-id="20">Import & Export</option>
                                        </select>
                                    </div>
                                    <div class="form-group" data-select2-id="17">
                                        <label for="select01">Course Level</label>
                                        <select id="select01" data-toggle="select" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                                            <option selected="" data-select2-id="2">Beginner</option>
                                            <option data-select2-id="19">Intermediate</option>
                                            <option data-select2-id="20">Expert</option>
                                        </select>
                                    </div>
                                    <div class="form-group dropzone" data-select2-id="18" action="/file-upload">
                                        <label for="select01">Course Preview Picture</label>
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="">
                                          </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>

                                
                                <!-- END FIRST TAB CONTENT -->
                            </div>
                            <div class="tab-pane fade" id="c-curriculum">
                                <!-- SECOND TAB CONTENT -->

                                <div class="col-md">
                                    <div class="card shadow-none border bg-light">
                                        <div class="card-body">
                                            <div class="card-header bg-light d-flex align-items-center">
                                                <div class="flex">
                                                    <h4 class="card-header__title">Course Curriculum</h4>
                                                    <div class="card-subtitle text-muted">Your course content here</div>
                                                </div>
                                                <div class="ml-auto">
                                                    <a href="" class="btn btn-primary ml-auto"><i class="material-icons">add</i> Add new Section</a>
                                                </div>
                                            </div>
                                            <div id="" class="card-list" data-toggle="dragula" data-dragula-moves="js-dragula-handle">
    
                                                <div class="card">
                                                    <div class="card-body media align-items-center">
                                                        <div class="media-left mr-3">
                                                            <a href="" class="btn btn-danger btn-light"><i class="material-icons">close</i> </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <strong>Introduction</strong><br>
                                                            <span class="text-muted">3 mins</span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-video"><i class="material-icons">file_upload</i> Upload Video</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-audio"><i class="material-icons">file_upload</i> Upload Audio</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-text"><i class="material-icons">file_upload</i> Upload Text</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span class="js-dragula-handle material-icons">drag_handle</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body media align-items-center">
                                                        <div class="media-left mr-3">
                                                            <a href="" class="btn btn-danger btn-light"><i class="material-icons">close</i> </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <strong>Customer Care</strong><br>
                                                            <span class="text-muted">4 mins</span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-video"><i class="material-icons">file_upload</i> Upload Video</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-audio"><i class="material-icons">file_upload</i> Upload Audio</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-text"><i class="material-icons">file_upload</i> Upload Text</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span class="js-dragula-handle material-icons">drag_handle</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-body media align-items-center">
                                                        <div class="media-left mr-3">
                                                            <a href="" class="btn btn-danger btn-light"><i class="material-icons">close</i> </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <strong>Ethics</strong><br>
                                                            <span class="text-muted">5 mins</span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-video"><i class="material-icons">file_upload</i> Upload Video</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-audio"><i class="material-icons">file_upload</i> Upload Audio</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span><a href="" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="#modal-text"><i class="material-icons">file_upload</i> Upload Text</a></span>
                                                        </div>
                                                        <div class="media-right ml-3">
                                                            <span class="js-dragula-handle material-icons">drag_handle</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- END SECOND TAB -->
                            </div>
                            <div class="tab-pane fade" id="c-pricing">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter course price ..">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Discounted Price</label>
                                        <textarea class="form-control" id="exampleInputPassword1" placeholder="Enter discounted price.."></textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <!-- // END content -->

          