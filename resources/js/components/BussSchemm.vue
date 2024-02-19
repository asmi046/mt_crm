<template>
    <div class="buss_schema">
        <div class="buss_coll buss_toda">
            <div class="head">
                <div class="comment"></div>
                <div class="voditel">Место водителя</div>
            </div>

            <div class="mesta">
                <div v-for="(item, index) in schema" :key="index" class="riad">
                    <div v-for="mesto in item" :key="'mesto_'+mesto" class="mesto">
                        {{ (mesto >= 0)?mesto:'' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="buss_coll buss_obratno">

        </div>
    </div>
</template>

<script>
export default {
    props: ['schema', 'punkt'],

    setup(props) {
        console.log(props.schema)

        return {
            schema:props.schema
        }
    }
}
</script>

<style>

</style>
