<div class="modal fade" id="personalinfo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-2" style="display: none;">
	<div class="modal-dialog modal-sm" role="document" style="width: 1500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modal_title">Add/Edit/View Personal Information</h4>
			</div>
			<div class="modal-body">
                <input type="hidden" class="form-control"  id="table_id_attr" >
               
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="text-center">
                            <p>
                            <button type="button" class="btn btn-info update-data" data-toggle="collapse" data-parent="#accordion" data-target="#benefits">Benefits</button>
                            <button type="button" class="btn btn-info update-data" data-toggle="collapse" data-parent="#accordion" data-target="#employment">Employment History</button>
                            <button type="button" class="btn btn-info update-data" data-toggle="collapse" data-parent="#accordion" data-target="#reference">Reference</button>
                            </p>
                        </div>
                        <div id="benefits" class="collapse in" >
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                        SSS:
                                    </div>
                                    <div class="col-sm-9">    
                                        <input type="text" class="form-control personalinfo-benefits" value="" placeholder="SSS Number" data-col="sss" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                        PhilHealth:
                                    </div>
                                    <div class="col-sm-9">    
                                        <input type="text" class="form-control personalinfo-benefits" value="" placeholder="PhilHealth Number" data-col="philhealth" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                        Pag-ibig:
                                    </div>
                                    <div class="col-sm-9">    
                                        <input type="text" class="form-control personalinfo-benefits" value="" placeholder="Pag-ibig Number" data-col="pagibig" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                    Pag-ibig Savings:
                                    </div>
                                    <div class="col-sm-9">    
                                        <input type="text" class="form-control personalinfo-benefits" value="" placeholder="Pag-ibig Savings Number" data-col="savings" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-3 control-label">
                                    Tin:
                                    </div>
                                    <div class="col-sm-9">    
                                        <input type="text" class="form-control personalinfo-benefits" value="" placeholder="Tin Number" data-col="tin" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="employment" class="collapse">
                            <div class="form-horizontal">
                                <div class="form-group">

                                    <label  class="col-sm-12 text-center">Employment History</label>
                                    <div class="todo-list-employment js__todo_list_employment"></div>

                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="todo-form">
                                        <div class="input-group-btn">
                                            <div class="col-sm-2">    
                                                <input type="text" class="form-control emp-data" value="" placeholder="Position" data-col="position" >
                                            </div>
                                            
                                            <div class="col-sm-3">    
                                                <input type="text" class="form-control emp-data" value="" placeholder="Company" data-col="company" >
                                            </div>
                                            
                                            <div class="col-sm-3">    
                                                <input type="text" class="form-control emp-data" value="" placeholder="Reason for Leaving" data-col="reason" >
                                            </div>
                                            
                                            <div class="col-sm-2">    
                                                <input type="date" class="form-control emp-data" value="" placeholder="From Date" data-col="date_from" >
                                            </div>
                                            
                                            <div class="col-sm-2">    
                                                <input type="date" class="form-control emp-data" value="" placeholder="To Date" data-col="date_to" >
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-success no-border text-white js__todo_button_employment waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="reference" class="collapse">
                            <div class="form-horizontal">
                                <div class="form-group">
                                
                                    <label  class="col-sm-12 text-center">Reference</label>
                                    <div class="todo-list-reference js__todo_list_reference"></div>                                   

                                </div>
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="todo-form">
                                        <div class="input-group-btn">
                                            <div class="col-sm-3">    
                                                <input type="text" class="form-control ref-data" value="" placeholder="Name" data-col="name" >
                                            </div>
                                            <div class="col-sm-3">    
                                                <input type="text" class="form-control ref-data" value="" placeholder="Company Name" data-col="company" >
                                            </div>
                                            <div class="col-sm-2">    
                                                <input type="text" class="form-control ref-data" value="" placeholder="Relationship" data-col="relationship" >
                                            </div>
                                            <div class="col-sm-3">    
                                                <input type="text" class="form-control ref-data" value="" placeholder="Contact" data-col="contact" >
                                            </div>
                                            <div class="col-sm-1">
                                                <button type="button" class="btn btn-success no-border text-white js__todo_button_reference waves-effect waves-light"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm waves-effect waves-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary btn-sm waves-effect waves-light save_record_benefits" id="info_data_btn">Save changes</button>
			</div>
		</div>
	</div>
</div>