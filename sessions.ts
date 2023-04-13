import { uid } from 'uid'

type Session = {
  idUser: string
  context: Record<string, unknown>
}
const sessions: Map<string, Session> = new Map()

export function findOrCreateSession(idUser: string): string {
  let idSession = ''

  sessions.forEach((session, id) => {
    if (session.idUser === idUser) {
      idSession = id
    }
  })

  if (!idSession) {
    idSession = uid(12)
    sessions.set(idSession, {
      idUser,
      context: {},
    })
  }

  return idSession
}

export function clearSession(idSession: string): void {
  sessions.delete(idSession)
}

function getSession(idSession: string): Session {
  const session = sessions.get(idSession)
  if (!session) {
    throw new Error()
  }
  return session
}

export function getContext(idSession: string): Record<string, unknown> {
  return getSession(idSession).context
}

export function getIDUser(idSession: string): string {
  return getSession(idSession).idUser
}

export function updateContext(
  idSession: string,
  context: Record<string, unknown>
): void {
  getSession(idSession).context = context
}
