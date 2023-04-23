<div class="modal fade" id="New">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h5 class="modal-title">Create a new beneficiary for the staff
                    member {{ $StaffName }}


                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-2x fa-times" aria-hidden="true"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body ">

                <form action="{{ route('MassInsert') }}" class="row"
                    method="POST" enctype=multipart/form-data> @csrf
                    <div class="row">


                        <div class="mb-3 col-md-4 ">
                            <label id="label" for=""
                                class="px-5 my-5 required form-label">Select
                                Identification Document Type</label>
                            <select required name="IDType"
                                class="form-select py-5 my-5 form-select-solid"
                                data-control="select2"
                                data-placeholder="Select a option">
                                <option></option>
                                <option value="Passport">Passport</option>
                                <option value="National ID Card">National ID
                                    Card</option>
                                <option value="Driver's License">Driver's
                                    License</option>
                                <option value="Voter ID Card">Voter ID Card
                                </option>
                                <option value="PAN Card">PAN Card</option>
                                <option value="Social Security Card">Social
                                    Security Card</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label id="label" for=""
                                class="px-5 my-5 required form-label">Select
                                Gender</label>
                            <select required name="Gender"
                                class="form-select py-5 my-5 form-select-solid"
                                data-control="select2"
                                data-placeholder="Select a option">
                                <option></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label id="label" for=""
                                class="px-5 my-5 mb-5 required form-label">Upload
                                ID
                                Scan (PDF)</label>
                            <input type="file" name="PdfIdScan"
                                class="form-control mt-5" accept=".pdf">
                        </div>



                        @foreach ($Form as $data)
                            @if ($data['type'] == 'string')
                                {{ CreateInputText($data, $placeholder = null, $col = '4') }}
                            @elseif (
                                'smallint' == $data['type'] ||
                                    'bigint' === $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'float' == $data['type'] ||
                                    'integer' == $data['type'] ||
                                    'decimal' == $data['type'] ||
                                    'bigint' == $data['type']
                            )
                                {{ CreateInputInteger($data, $placeholder = null, $col = '4') }}
                            @elseif ($data['type'] == 'date' || $data['type'] == 'datetime')
                                {{ CreateInputDate($data, $placeholder = null, $col = '4') }}
                            @endif
                        @endforeach

                    </div>

                    <div class="row">
                        @foreach ($Form as $data)
                            @if ($data['type'] == 'text')
                                {{ CreateInputEditor($data, $placeholder = null, $col = '12') }}
                            @endif
                        @endforeach

                    </div>


                    <input type="hidden" name="EmpID"
                        value="{{ $EmpID }}">

                    <input type="hidden" name="TableName"
                        value="staff_beneficiaries">




            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info"
                    data-bs-dismiss="modal">Close</button>

                <button type="submit" class="btn btn-dark">Save
                    Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
