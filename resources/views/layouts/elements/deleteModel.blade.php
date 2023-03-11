<div class="modal fade" id="deleteModel" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticرجوع drop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content send-ajax" id="deleteForm" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    هل انت متاكد من المسح ? (<span class="title"></span> )
                </h5>
                <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                    <span class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label>العنصر</label>
                    <input class="form-control title_val" disabled="disabled" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">اغلاق</button>
                <button type="submit" id="kt_subscriptions_export_submit" class="btn btn-primary font-weight-bold">
                    <span class="indicator-label">مسح</span>
                    <span class="indicator-progress">الرجاء الانتظار...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>
@push('stack-js')
    <script>
        // var datatable = $('#kt_datatable').KTDatatable({});
        $('#deleteModel').on('shown.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            // console.log(btn);
            // console.log(btn.data('title'));
            $("#deleteForm").attr('action', btn.data('action'))
            $("#deleteModel .title").html(btn.data('title'))
            $("#deleteForm .title_val").val(btn.data('title'))
        })
    </script>
@endpush
