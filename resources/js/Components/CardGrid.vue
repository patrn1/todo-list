Task<style scoped>
    .v-card, .task-edit-form {
        height: 200px;
        max-width: 400px;
    }
    :deep(.v-card-text), :deep(.v-card-subtitle) {
        white-space: pre;
        overflow: hidden;
        padding-top: 10px;
    }
    :deep(.v-card-item) {
      display: none;
    }
</style>
<script setup>

import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
  itemList: {
    type: Array,
  },
  cardTitleGetter: {
    type: Function,
    default: () => {},
  },
  cardTextGetter: {
    type: Function,
    default: () => {},
  },
  cardSubtitleGetter: {
    type: Function,
    default: () => {},
  },
  buttonsGetter: {
    type: Function,
    default: () => {},
  },
  editedItem: {
    type: Object,
  },
  onCardClick: {
    type: Function,
    default: () => {},
  },
  onSave: {
    type: Function,
    default: () => {},
  },
  onCancel: {
    type: Function,
    default: () => {},
  },
});

let form;

function saveForm(item) {
  form = useForm({ ...item });

  props.onSave(form);
}

function cancelForm() {

  props.onCancel(form);

  form = null;
}

</script>

<template>
    <div class="card-list grid sm:grid-cols-1 md:grid-cols-3 gap-2 bg-white shadow sm:rounded-lg">

        <template v-for="(item, i) in itemList" :key="i">
          <template v-if="item">
            <div class="task-edit-form" v-if="item == editedItem">
              <v-form>
                <v-container>
                  <v-row>
                    <v-col
                      cols="9"
                    >
                      <v-textarea
                        v-model="item.text"
                        required
                      ></v-textarea>
                      <InputError class="mt-2" :message="form?.errors.text" />
                    </v-col>
                    <v-col
                      cols="3"
                    >
                      <div>
                        <v-btn @click.stop="saveForm(item)">
                            <svg class="w-100 h-100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Interface / Check">
                            <path id="Vector" d="M6 12L10.2426 16.2426L18.727 7.75732" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            </svg>
                        </v-btn>
                      </div>
                      <div class="mt-1">
                        <v-btn @click.stop="cancelForm()">
                          <svg class="w-100 h-100"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z" fill="#0F0F0F"/>
                          </svg>
                        </v-btn>
                      </div>
                    </v-col>
                  </v-row>
                </v-container>
              </v-form>
            </div>
            <div v-else-if="item.id" class="card-wrapper">
                <v-card
                    class="d-flex flex-column"
                    variant="outlined"
                    :title="cardTitleGetter(item)"
                    :text="cardTextGetter(item)"
                    :subtitle="cardSubtitleGetter(item)"
                    @click="onCardClick(item)"
                >
                    <v-spacer></v-spacer>

                    <v-card-actions>

                        <slot :item="item"></slot>

                    </v-card-actions>
                    <div></div>
                </v-card>
            </div>
          </template>
        </template>
    </div>
</template>
