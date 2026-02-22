import {
  deleteData,
  getData,
  getSingleData,
  postData
} from "../../plugins/api";

/**
 * 🔹 Récupérer tous les membres du comité
 */
export async function allComiters() {
  try {
    const res = await getData('/allcomiter');
    return res.data.data;
  } catch (error) {
    console.error('Erreur allComiters:', error);
    throw error;
  }
}

/**
 * 🔹 Récupérer un membre du comité par ID
 */
export async function singleComiter(id) {
  try {
    const res = await getSingleData('/showcomiter/' + id);
    return res.data.data;
  } catch (error) {
    console.error('Erreur singleComiter:', error);
    throw error;
  }
}

/**
 * 🔹 Ajouter un membre du comité
 */
export async function postComiter(data) {
  try {
    const res = await postData('/addcomiter', data);
    return res.data.data ?? res.data;
  } catch (error) {
    console.error('Erreur postComiter:', error);
    throw error;
  }
}

/**
 * 🔹 Mettre à jour un membre du comité
 * ⚠️ Update en POST (comme défini côté Laravel)
 */
export async function updateComiter(id, data) {
  try {
    const res = await postData('/updatecomiter/' + id, data);
    return res.data.data ?? res.data;
  } catch (error) {
    console.error('Erreur updateComiter:', error);
    throw error;
  }
}

/**
 * 🔹 Supprimer un membre du comité
 */
export async function deleteComiter(id) {
  try {
    const res = await deleteData('/deletecomiter/' + id);
    return res.data.data;
  } catch (error) {
    console.error('Erreur deleteComiter:', error);
    throw error;
  }
}