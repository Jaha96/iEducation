/**
 * Created by n0m4dz on 4/17/16.
 */
export default function UserReducer(user = {}, action) {
    switch (action.type) {
        case 'UPDATE_USER':
            return {
                name: 'Tseegii',
                id: action.id
            }
        default:
            return user
    }
}