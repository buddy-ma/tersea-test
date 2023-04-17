<div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- Modal To add employe --}}
    <div class="modal fade" id="modaldemo1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Invitation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <label class="form-label d-block">Name*</label>
                        <input class="form-control mb-4" required placeholder="Name" wire:model="title" type="text">
                        <label class="form-label d-block">Email*</label>
                        <input class="form-control mb-4" id="invit_email" placeholder="Email" wire:model="email"
                            type="email" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" onclick="addInvitation()">Save
                            changes</button>
                        <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close"
                            type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="finished" tabindex="-1" role="dialog"
        aria-labelledby="finishedLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid text-center">
                        <lottie-player style="height: 200px" src="{{ URL::asset('admin_assets/SVG/congrats.json') }}"
                            class="lottie" background="transparent" speed="0.5" loop autoplay mode="bounce">
                        </lottie-player>
                        <h3> Success </h3>
                        <p>Invitation submitted successfully</p>
                        <div class="coupon-row">
                            <span class="cpnCode" id="link">{{ $link }}</span>
                            <span class="cpnBtn" onclick="copyToClipboard()">
                                <i class="bi bi-clipboard-check-fill m-0"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <a onClick="window.location.reload();" type="button">
                        <button type="button" class="btn btn-success text-white">
                            Complete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script>
            function addInvitation() {
                $('#modaldemo1').modal('hide');
                livewire.emit('addInvitation');
            }

            function copyToClipboard() {
                var text = document.getElementById('link').innerHTML;
                navigator.clipboard.writeText(text);

                nottification('copy to clipboard !', 'success');
            }

            function nottification(title, icon) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    title: title,
                    icon: icon,
                })
            }

            window.addEventListener('saved', event => {
                $('#finished').modal('show');
            });
        </script>
    @endsection
</div>
