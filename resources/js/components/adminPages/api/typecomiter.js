import {
  deleteData,
  getData,
  getSingleData,
  postData,
  putData
} from "../../plugins/api";

/* ==========================
   🔹 TypeComite
========================== */

/**
 * Récupérer tous les types de speakers
 */
export async function allTypeComite() {
  return await getData('/allcomitertype').then(res => res.data);
}

/**
 * Récupérer un type de speaker par ID
 */
export async function singleTypeComite(id) {
  return await getSingleData('/showcomitertype/' + id).then(res => res.data);
}

/**
 * Ajouter un type de speaker
 */
export async function postTypeComite(data) {
  return await postData('/addcomitertype', data).then(res => res.data.data ?? res.data);
}

/**
 * Mettre à jour un type de speaker
 */
export async function updateTypeComite(id, data) {
  return await putData('/updatecomitertype/' + id, data).then(res => res.data.data ?? res.data);
}

/**
 * Supprimer un type de speaker
 */
export async function deleteTypeComite(id) {
  return await deleteData('/deletecomitertype/' + id).then(res => res.data);
}