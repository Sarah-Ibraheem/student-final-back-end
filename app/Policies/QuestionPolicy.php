<?php

namespace App\Policies;

use App\Enums\UserType;
use App\Question;
use App\Tag;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Question $question
     *
     * @return bool
     */
    public function view(User $user, Question $question)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     *
     * @return bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Question $question
     *
     * @return bool
     */
    public function update(User $user, Question $question)
    {
        return $question->user->id === $user->id ||
               $user->type === UserType::getTypeString(UserType::ADMIN);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Question $question
     *
     * @return bool
     */
    public function delete(User $user, Question $question)
    {
        return $question->user->id === $user->id ||
               $user->type === UserType::getTypeString(UserType::ADMIN);
    }

    /**
     * Determine whether the user can attach models.
     *
     * @param \App\User $user
     * @param \App\Question $question
     * @param \App\Tag $tag
     *
     * @return bool
     */
    public function attach(User $user, Question $question, Tag $tag)
    {
        return $question->user->id === $user->id ||
               $user->type === UserType::getTypeString(UserType::ADMIN);
    }

    /**
     * Determine whether the user can detach models.
     *
     * @param \App\User $user
     * @param \App\Question $question
     * @param \App\Tag $tag
     *
     * @return bool
     */
    public function detach(User $user, Question $question, Tag $tag)
    {
        return $question->user->id === $user->id ||
               $user->type === UserType::getTypeString(UserType::ADMIN);
    }
}