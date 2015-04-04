<!-- Modal -->
<div class="modal fade" id="map_modal" tabindex="-1" role="dialog" aria-labelledby="map_modal_Label" aria-hidden="true">
    <div  class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="search_guide_modal_Label">
                    <i class="fa fa-map-marker"></i>&nbsp;Map Model
                </h4>
            </div>
            <div class="modal-body" >
                <body onload="load()" onunload="GUnload()" >

  <div align="center" id="map" style="width: 580px; height: 400px"><br/></div>
   
</body>
            </div>
            <div class="modal-footer">
                <table  bgcolor="#FFFFCC" width="300">
                <tr>
                  <td><b>Latitude</b></td>
                  <td><b>Longitude</b></td>
                </tr>
                <tr>
                  <td id="lat"></td>
                  <td id="lng"></td>
                </tr>
               </table>
                 <button id="set-new-place-coordenate" type="button" class="btn btn-primary" data-dismiss="modal">Get Coordinates</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



