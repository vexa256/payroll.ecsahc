<div class="container-fluid pt-3 mt-5">
    @include('Set.buttons')
    @include('Set.Stats')
    @include('Set.NewTax')
    @include('Set.NewCDeduction')
    @include('Set.NewPDeduction')
    @include('Set.NewPBenefit')
    @include('Set.NewCBenefit')

    @include('Reports.AttachedCB')
    @include('Reports.AttachedCBSummary')
    @include('Reports.AttachedCD')
    @include('Reports.AttachedCDSummary')

</div>



@include('Set.cards')


@include('Reports.TableModals')



<div class="row container mt-5 pt-5 justify-content-center">

    <div class="col-3 text-center">
        <a href="#CBList" data-bs-toggle="modal"
            class="btn-sm btn shadow-lg  btn-success">
            <i class="fas fa-plus-circle"></i> Constant Benefits List
        </a>
    </div>

    <div class="col-3 text-center">
        <a href="#CDList" data-bs-toggle="modal"
            class="btn-sm btn shadow-lg  btn-danger">
            <i class="fas fa-minus-circle"></i> Constant Deductions List
        </a>
    </div>

    <div class="col-3 text-center">
        <a href="#PBList" data-bs-toggle="modal"
            class="btn-sm btn shadow-lg  btn-primary">
            <i class="fas fa-percentage"></i> Percentage Benefits List
        </a>
    </div>

    <div class="col-3 text-center">
        <a href="#PDList" data-bs-toggle="modal"
            class="btn-sm btn shadow-lg  btn-dark">
            <i class="fas fa-percent"></i> Percentage Deductions List
        </a>
    </div>

</div>


<div class="row container">

    @include('Reports.Payroll')
</div>
