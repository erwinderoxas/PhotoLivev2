<!DOCTYPE html>
<html>
<head>
	<title></title>

	
	
</head>
<body>
	<span id="widget" class="widget" field="AGE" roundby="20" description="Patient age, in years">
    <div class="header ng-scope">
      <div class="title ng-binding">AGE</div>
      <p class="ng-binding">Patient age, in years</p>
    </div>
    <div class="element ng-scope">
      <div ng-show="hasData()" class="content">
        <table ng-model="table" class="ng-pristine ng-valid">
          <colgroup>
            <col/>
            <col width="60x"/>
            <col width="100px"/>
          </colgroup>
          <thead>
            <tr>
              <th class="cell value">Value</th>
              <th class="cell freq">Freq</th>
              <th class="cell value"></th>
            </tr>
          </thead>
          <tbody>
<tr ng-repeat="rowKey in table.rowKeys | orderBy:elementRowSort " ng-click="onSelect(rowKey, $event.shiftKey)" ng-class="{true:'selected'}[isSelected(rowKey)]" data-key="0" class="selectable ng-scope">
            <td class="cell value"><span tooltip="0 to 19" class="ng-scope ng-binding">0 to 19</span>
            </td>

            <td class="cell freq ng-binding">17.2%</td>
            <td class="cell glyph">
              <span class="bar bar-both" ng-style="{width: (table.getBothPct(rowKey) | barSize)+'%' }" style="width: 17.234468937875754%;"></span>
              <span class="bar bar-fg" ng-style="{width: (table.getFgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
              <span class="bar bar-bg" ng-style="{width: (table.getBgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
            </td>
          </tr><tr ng-repeat="rowKey in table.rowKeys | orderBy:elementRowSort " ng-click="onSelect(rowKey, $event.shiftKey)" ng-class="{true:'selected'}[isSelected(rowKey)]" data-key="20" class="selectable ng-scope">
            <td class="cell value"><span tooltip="20 to 39" class="ng-scope ng-binding">20 to 39</span>
            </td>
            <td class="cell freq ng-binding">18.0%</td>
            <td class="cell glyph">
              <span class="bar bar-both" ng-style="{width: (table.getBothPct(rowKey) | barSize)+'%' }" style="width: 18.03607214428858%;"></span>
              <span class="bar bar-fg" ng-style="{width: (table.getFgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
              <span class="bar bar-bg" ng-style="{width: (table.getBgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
            </td>
          </tr><!-- end ngRepeat: rowKey in table.rowKeys | orderBy:elementRowSort --><tr ng-repeat="rowKey in table.rowKeys | orderBy:elementRowSort " ng-click="onSelect(rowKey, $event.shiftKey)" ng-class="{true:'selected'}[isSelected(rowKey)]" data-key="40" class="selectable ng-scope">
            <td class="cell value"><span tooltip="40 to 59" class="ng-scope ng-binding">40 to 59</span>
            </td>

            <!--<td >{{table.getRowPercent('current', rowKey) | percent}}</td>-->
            <td class="cell freq ng-binding">34.3%</td>
            <td class="cell glyph">
              <!--<div class="bar bar-both" style="width: {{(row.current.pct * 100)||2}}px; " ></div>-->
              <span class="bar bar-both" ng-style="{width: (table.getBothPct(rowKey) | barSize)+'%' }" style="width: 34.2685370741483%;"></span>
              <span class="bar bar-fg" ng-style="{width: (table.getFgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
              <span class="bar bar-bg" ng-style="{width: (table.getBgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
            </td>
          </tr><!-- end ngRepeat: rowKey in table.rowKeys | orderBy:elementRowSort --><tr ng-repeat="rowKey in table.rowKeys | orderBy:elementRowSort " ng-click="onSelect(rowKey, $event.shiftKey)" ng-class="{true:'selected'}[isSelected(rowKey)]" data-key="60" class="selectable ng-scope">
            <td class="cell value"><span tooltip="60 to 79" class="ng-scope ng-binding">60 to 79</span>
            </td>

            <!--<td >{{table.getRowPercent('current', rowKey) | percent}}</td>-->
            <td class="cell freq ng-binding">24.0%</td>
            <td class="cell glyph">
              <!--<div class="bar bar-both" style="width: {{(row.current.pct * 100)||2}}px; " ></div>-->
              <span class="bar bar-both" ng-style="{width: (table.getBothPct(rowKey) | barSize)+'%' }" style="width: 24.04809619238477%;"></span>
              <span class="bar bar-fg" ng-style="{width: (table.getFgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
              <span class="bar bar-bg" ng-style="{width: (table.getBgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
            </td>
          </tr><!-- end ngRepeat: rowKey in table.rowKeys | orderBy:elementRowSort --><tr ng-repeat="rowKey in table.rowKeys | orderBy:elementRowSort " ng-click="onSelect(rowKey, $event.shiftKey)" ng-class="{true:'selected'}[isSelected(rowKey)]" data-key="80" class="selectable ng-scope">
            <td class="cell value"><span tooltip="80 to 99" class="ng-scope ng-binding">80 to 99</span>
            </td>

            <!--<td >{{table.getRowPercent('current', rowKey) | percent}}</td>-->
            <td class="cell freq ng-binding">6.4%</td>
            <td class="cell glyph">
              <!--<div class="bar bar-both" style="width: {{(row.current.pct * 100)||2}}px; " ></div>-->
              <span class="bar bar-both" ng-style="{width: (table.getBothPct(rowKey) | barSize)+'%' }" style="width: 6.4128256513026045%;"></span>
              <span class="bar bar-fg" ng-style="{width: (table.getFgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
              <span class="bar bar-bg" ng-style="{width: (table.getBgPct(rowKey) | barSize) +'%' }" style="width: 0%;"></span>
            </td>
          </tr><!-- end ngRepeat: rowKey in table.rowKeys | orderBy:elementRowSort -->
          <tr ng-show="getShowMean()" class="">
            <td class="stat">Mean</td>
            <td class="ng-binding">46.1</td>
          </tr>


          </tbody>
        </table>
      </div>


    </div>
  <!-- ngRepeat: field in getChildren(field) -->
</span>
<br/>
<button onclick="createPNG()">save</button>
<div id="img-out"></div>

</body>
</html>