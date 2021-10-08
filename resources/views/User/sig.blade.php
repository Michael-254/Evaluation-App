
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <style>
        .kbw-signature {
            width: 110%;
            height: 40px;
        }
    </style>

    <div class="row">
        <div>
            <form method="POST" action="{{route('signature.store')}}">
                @csrf
                <div class="row space-x-2">
                    <div class="form-group">
                        <p class="font-sans text-green-700 mb-2">Date</p>
                        <input type="text" name="date" readonly class="border rounded-md text-sm" value="{{now()->format('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <p class="font-sans text-green-700 mb-2">Role</p>
                        <select name="role" class="border rounded-md" required>
                            <option value="">-- Select Role --</option>
                            <option value="employee">Employee</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="hod">HOD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p class="font-sans text-green-700 mb-2">Signature</p>
                        <div id="sig" class="border rounded-lg"></div>
                        <textarea id="signature64" name="signature" style="display: none"></textarea>
                    </div>
                </div>
                <div>
                    <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                    <button type="submit" class="btn btn-success btn-sm">Save Signature</button>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>