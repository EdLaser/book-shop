<template>
    <tr>
        <td>
            <slot name="bookName"></slot>
        </td>
        <td>
            <slot name="amount"></slot>
        </td>
        <td>
            <slot name="buttons">

            </slot>
        </td>
        <td class="text-danger"><slot name="warning"></slot></td>
    </tr>
</template>