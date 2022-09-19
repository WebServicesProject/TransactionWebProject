<x-layout>
    <div class="vr"></div>
    <div class="col-md-9">
        <div class="row">

            <div class="col-md-12">

            <x-search/>

            </div>
        </div>
        <br><br>

        <div clas="row">
            <div class="col-md-12">
                <table class="table table-bordered">

                    <thead id="listhead">
                    <tr>
                        <th id="th1">ISBN</th>
                        <th id="th2">Title</th>
                        <th id="th3">Category</th>
                        <th id="th4">Stock</th>
                        <th id="th5">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td><button type="submit"
                                    class="w-50 btn btn-sm  btn-warning">&nbsp&nbspLoan&nbsp&nbsp</button></td>

                    </tr>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>

                    </tr>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                    </tr>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>

                    </tr>
                    <tr>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>
                        <td>&nbsp</td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div id="pagelist">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>

    </div>
</x-layout>
