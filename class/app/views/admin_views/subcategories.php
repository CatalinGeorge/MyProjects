<div ng-controller="getSubcategories" ng-init="getSubcategoriesInit(<?php echo $main; ?>)">

  <?php
    foreach($categories as $cat) { ?>
      <a href="<?php echo base_url(); ?>admin/categories/get_subcategories/<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></a>
    <?php } ?>

  <!-- Nested node template -->
  <script type="text/ng-template" id="nodes_renderer.html">
    <div class="tree-node tree-node-content">
      <a ui-tree-handle>Drag</a>
      <a class="btn btn-success btn-xs pull-right" data-nodrag ng-click="edit(data)"><span class="glyphicon glyphicon-edit"></span></a>
      <a class="btn btn-success btn-xs" ng-if="node.nodes && node.nodes.length > 0" data-nodrag ng-click="toggle(this)"><span
          class="glyphicon"
          ng-class="{
            'glyphicon-chevron-right': collapsed,
            'glyphicon-chevron-down': !collapsed
          }"></span></a>



      <input value="{{node.title}}" ng-click="edit(node.id)">


      
      <a class="pull-right btn btn-danger btn-xs" data-nodrag ng-click="remove(this)"><span
          class="glyphicon glyphicon-remove"></span></a>
      <a class="pull-right btn btn-primary btn-xs" data-nodrag ng-click="newSubItem(this)" style="margin-right: 8px;"><span
          class="glyphicon glyphicon-plus"></span></a>
    </div>
    <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
      <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
      </li>
    </ol>
  </script>

  <div class="row">
    <div class="col-sm-12">
      <h3>Basic Example</h3>

      <button ng-click="expandAll()">Expand all</button>
      <button ng-click="collapseAll()">Collapse all</button>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-6">
      <div ui-tree id="tree-root">
        <ol ui-tree-nodes ng-model="data">
          <li ng-repeat="node in data" ui-tree-node ng-include="'nodes_renderer.html'"></li>
        </ol>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="info">
        {{info}}
      </div>
      <pre class="code">{{ data | json }}</pre>
    </div>
  </div>

<a ng-click="save(<?php echo $main; ?>)">Save</a>


</div>
