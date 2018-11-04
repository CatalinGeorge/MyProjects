<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="" ng-init="ticketsPage();">

        <!-- Start Page Content -->
            <div class="container pb50">
              <h3 class="text-white center ptb50">Helpdesk & Chat - Admin</h3>
              <div class="row p0 bg-light">

                <!--Left col-->
                <div class="col-md-2 p0 bg-light">
                  <div class="btn-success ptb15 text-white center border-bottom2 cap" data-toggle="modal" data-target="#myModal">new ticket</div>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <!-- Header Modal -->
                        <div class="bg-white border-bottom2 p0">
                          <button type="button" class="close bg-success ptb15 plr20 m0" data-dismiss="modal">&times;</button>
                          <p class="bg-success inline modal-title center text-white plr20 ptb15">Write your ticket</p>
                        </div>
                        <!-- Body Modal -->
                        <div class="modal-body p0">
                          <div class="">
                              <div class="bg-white box-shadow p0">
                                <?php echo form_open_multipart('submit/submit_ticket'); ?>
                                <div class="plr50 pt50 pb10">
                                  <div class="ptb20">
                                    <div class="form-group">
                                      <input type="text" name="title" class="full-width border-gray ptb10 pl20" placeholder="Title"/>
                                    </div>
                                    <div class="btn-group mb15 priority-buttons">

                                      <input type="radio" name="type" value="Low" class="no-round btn btn-success" id="priority-low">
                                      <label for="priority-low">Low</label>


                                      <input type="radio" name="type" value="Medium" class="no-round btn btn-success" id="priority-medium">
                                      <label for="priority-medium">Medium</label>

                                      <input type="radio" name="type" value="Urgent" class="no-round btn btn-success" id="priority-urgent">
                                      <label for="priority-urgent">Urgent</label>
                                    </div>
                                      <div class="form-group">
                                          <textarea name="description" rows="6" placeholder="Hello Peter ..." class="pt10 pl20 full-width no-resize border-gray"></textarea>
                                      </div>
                                      <div class="form-group mb0">
                                          <div class="text-right">
                                              <div class="inline btn bg-gray2 center round-small relative text-gray" >
                                                <span ng-show="!filename"><i class="fa fa-paperclip"></i> &nbsp;Attach file...</span>
                                                <input type="file" name="document" class="op0 absolute top-0 full" file-model="myFile">
                                                {{filename}}
                                              </div>
                                              <button class="btn btn-success text-white"><i class="fa fa-send mr5"></i> <span class="text-white">Send</span></button>

                                          </div>
                                      </div>
                                  </div>
                                </div>
                                </form>


                              </div>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                  <div class="p10">
                    <div class="mail-list">
                        <a ng-click="action='inbox'; selected = ticketsInbox[0];" href="#" class="p10" ng-class="{'text-success fw600' : action == 'inbox'}">Inbox</a>
                        <a ng-click="action='trash'; selected = ticketsTrash[0];" href="#" class="p10"  ng-class="{'text-success fw600' : action == 'trash'}">Trash</a>
                        <a href="<?php echo base_url(); ?>account/logout_user" class="mt50 p10">Logout</a>
                    </div>
                  </div>

                </div>


                <!--Inbox-->
                <div ng-show="action == 'inbox'" ng-init="getInbox()">
                <!--Middle col-->
                <div class="col-md-3 bg-light p0 border-right2 border-left2">
                  <div class="border-bottom2 ptb15 text-gray plr20 cap">inbox</div>
                  <h4 class="p50" ng-show="ticketsInbox == 'false'">You've got no tickets.</h4>
                  <a ng-show="ticketsInbox != 'false'" href="" ng-repeat="tik in ticketsInbox" ng-click="select($index)">
                    <div class="p20 bg-white-effect2">
                      <p class="cap m0 text-gray fw600" ng-class="{'pl10' : tik.tic_opened_admin == 0}">
                          <span class="none absolute unread-circle" ng-class="{'inline' : tik.tic_opened_admin == 0}">
                          <svg width="6" height="6">
                            <rect width="6" height="6" style="fill:#10cfbd" />
                          </svg>
                        </span>
                        {{tik.tic_title}}
                        <span class="float-right fw100 text-grey font-14">{{tik.tic_data}}</span>
                      </p>
                      <p class="font-14 pt5 m0 text-gray">{{tik.tic_description | crop:70}}</p>
                    </div>
                    <hr class="m0 op3">
                  </a>


                </div>


                <!--Right col-->
                <div class="col-md-7 bg-white p0" ng-show="ticketsInbox != 'false'">
                  <div class="bg-white border-bottom2 text-gray">
                    <div class="plr20 ptb15 inline">
                      <a href="" ng-click="delete()" class="plr20 fa fa-trash border-right-dark"></a>
                      <a class="plr20 fa fa-reply" href="#write"></a>
                    </div>
                    <div class="inline float-right  text-white relative">

                      <div ng-show="selected.tic_priority == 'Low'" class="absolute full op7 bg-low"></div>
                      <div ng-show="selected.tic_priority == 'Medium'" class="absolute full op7 bg-med"></div>
                      <div ng-show="selected.tic_priority == 'Urgent'" class="absolute full op7 bg-urg"></div>

                      <p class="text-white inline plr20 ptb15 m0 relative font-14">
                        {{selected.tic_priority}}
                      </p>
                    </div>
                  </div>

                  <div class="p50 clearfix">
                    <p class="text-gray font-12 op7 pb20">
                      {{selected.tic_data}}
                    </p>
                    <h3 class="pb30">{{selected.tic_title}}</h3>
                    <p class="text-gray">{{selected.tic_description}}</p>

                    <a class="inline pt30" href="<?php echo base_url(); ?>media/{{selected.tic_media_folder}}/{{selected.tic_media_attach}}">{{selected.tic_media_attach}}</a>

                    <hr>
                    <h3 class="pb20">Discussions</h3>
                    <div class="p20" style="height: 400px; overflow-y: scroll; overflow-x: hidden;">
                      <div ng-show="ticketMessages != 'false'" ng-repeat = "mes in ticketMessages" class="pb50" ng-class="{'pl10' : mes.me_user != <?php echo $user['us_id']; ?>}">
                        <span id="write" ng-if="$last" ></span>
                        <p class="text-gray font-11 m0" ng-class="{'fw600 text-success' : mes.me_user != <?php echo $user['us_id']; ?>}">{{mes.us_username}}</p>
                        <p class="m0">{{mes.me_message}}</p>
                        <a ng-show="mes.me_attach != 'no-image'" href="<?php echo base_url(); ?>media/{{selected.tic_media_folder}}/{{mes.me_attach}}" target="_blank" class="inline btn bg-gray2 center round-small relative text-gray mt10">{{mes.me_attach}}</a>
                      </div>

                        <div class="form-group">
                            <textarea rows="4" placeholder="Reply ..." class="pt10 pl20 full-width no-resize border-gray" ng-model="message"></textarea>
                        </div>
                        <div class="form-group mb0">
                            <div class="text-right">
                                <div class="inline btn bg-gray2 center round-small relative text-gray" >
                                  <span ng-show="!filename"><i class="fa fa-paperclip"></i> &nbsp;Attach file...</span>
                                  <input type="file" name="img" class="op0 absolute top-0 full" file-model="myFile">
                                  {{filename}}
                                </div>
                            </div>
                            <div class="col-md-6">
                              <a href="mailto:{{selected.tic_email}}">{{selected.us_email}}</a>
                            </div>
                            <div class="col-md-6 text-right mt20">
                              <a class="btn btn-success text-white"><i class="fa fa-send mr5"></i> <span class="text-white" ng-click="publishMessage(message)">Send</span></a>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>

              </div><!--Inbox-->



            <!--Trash-->
            <div ng-show="action == 'trash'" ng-init="getTrash()">
            <!--Middle col-->
            <div class="col-md-3 bg-light p0 border-right2 border-left2">
              <div class="border-bottom2 ptb15 text-gray plr20 cap">trash</div>

              <h4 class="p50" ng-show="ticketsTrash == 'false'">You've got no tickets.</h4>
              <a ng-show="ticketsTrash != 'false'" href="" ng-repeat="tik in ticketsTrash" ng-click="select($index)">
                <div class="p20 bg-white-effect2">
                  <p class="cap m0 text-gray fw600" ng-class="{'pl10' : tik.tic_opened_admin == 0}">
                      <span class="none absolute unread-circle" ng-class="{'inline' : tik.tic_opened_admin == 0}">
                      <svg width="6" height="6">
                        <rect width="6" height="6" style="fill:#10cfbd" />
                      </svg>
                    </span>
                    {{tik.tic_title}}
                    <span class="float-right fw100 text-grey font-14">{{tik.tic_data}}</span>
                  </p>
                  <p class="font-14 pt5 m0 text-gray">{{tik.tic_description}}</p>
                </div>
                <hr class="m0 op3">
              </a>


            </div>


            <!--Right col-->
            <div class="col-md-7 bg-white p0" ng-show="ticketsTrash != 'false'">

              <div class="p50 clearfix">
                <p class="text-gray font-12 op7 pb20">
                  {{selected.tic_data}}
                </p>
                <h3 class="pb30">{{selected.tic_title}}</h3>
                <p class="text-gray">{{selected.tic_description}}</p>



              </div>
            </div>

          </div><!--Trash-->




              </div>
            </div>
</div>
