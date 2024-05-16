<template lang="pug">
    <div>
        <h1>Where IS</h1>
        <p>Data received from parent component:</p>
        <pre>{{ data.text }}</pre>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Object,
            required: true
        }
    },
};
</script>
