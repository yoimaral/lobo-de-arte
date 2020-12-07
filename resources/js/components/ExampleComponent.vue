<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>


                 <!-- Implement Canvast for grafic  -->
                <div class="row col-6">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
                 <!-- End Canvast --> 


                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'example-component',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
